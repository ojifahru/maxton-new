<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Config\Auth as AuthConfig;
use App\Entities\User;
use App\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Intervention\Image\ImageManager as Image;

class UserController extends BaseController
{
    protected $auth;

    /**
     * @var AuthConfig
     */
    protected $config;

    /**
     * @var Session
     */
    protected $session;

    protected $groupModel;
    protected $userModel;

    public function __construct()
    {
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth   = service('authentication');
        $this->groupModel = new GroupModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (! in_groups('superadmin')) {
            $users = $this->userModel->select('users.*')
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
                ->whereIn('auth_groups.name', ['admin', 'user'])
                ->findAll();
        } else {
            $users = $this->userModel->findAll();
        }

        $delUsers = $this->userModel->onlyDeleted()->findAll();

        // Menggunakan metode getGroupsForUser dari GroupModel
        foreach ($users as $user) {
            $groups = $this->groupModel->getGroupsForUser($user->id);
            $user->group = implode(', ', array_column($groups, 'name'));
        }

        $data = [
            'title' => 'Manage Users',
            'users' => $users,
            'delUsers' => $delUsers,
        ];

        return view('admin/users/index', $data);
    }

    public function store()
    {
        // Add your logic here or remove this method if not needed
        $users = $this->userModel;

        $rules = config('Validation')->registrationRules ?? [
            'fullname' => 'required|alpha_space|min_length[3]|max_length[30]',
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'phone'    => 'required|numeric|min_length[10]|max_length[15]',
            'image'    => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('addUserErrors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('addUserErrors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user              = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image->isValid() && ! $image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/users', $newName);

            // Scale the image using Intervention Image
            $imagePath = 'uploads/users/' . $newName;
            $image = Image::imagick()->read($imagePath)->scale(150, 150);
            $image->save($imagePath);
            $user->image = $newName;
        }

        // Pastikan user masuk ke grup yang sesuai
        if (! in_groups('superadmin')) {
            // Ambil ID grup 'admin' dan 'user'
            $allowedGroups = ['admin', 'user'];

            // Pastikan user hanya bisa memilih 'admin' atau 'user'
            $groupId = $this->request->getPost('group') ?: $this->config->defaultUserGroup;
            if (!in_array($groupId, $allowedGroups)) {
                return redirect()->back()->withInput()->with('addUserErrors', ['group' => 'You can only assign users to Admin or User group.']);
            }
        } else {
            $groupId = $this->request->getPost('group') ?: $this->config->defaultUserGroup;
        }


        if (!empty($groupId)) {
            $users = $users->withGroup($groupId);
        }

        if (! $users->save($user)) {
            return redirect()->back()->withInput()->with('addUserErrors', $users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent      = $activator->send($user);

            if (! $sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->route('user.index')->with('success', lang('Auth.activationSuccess'));
        }

        // Success!
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        if (! $user) {
            return redirect()->route('user.index')->with('error', 'User not found');
        }

        // Check if the user is a superadmin
        $groups = $this->groupModel->getGroupsForUser($user->id);
        $user->group = implode(', ', array_column($groups, 'name'));

        if (! in_groups('superadmin') && in_array('superadmin', array_column($groups, 'name'))) {
            return redirect()->route('user.index')->with('error', 'You do not have permission to edit this user');
        }

        $data = [
            'title' => 'User Edit',
            'user'  => $user,
        ];

        return view('admin/users/edit', $data);
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Check if the user is a superadmin
        $groups = $this->groupModel->getGroupsForUser($user->id);
        $user->group = implode(', ', array_column($groups, 'name'));

        if (! in_groups('superadmin') && in_array('superadmin', array_column($groups, 'name'))) {
            return redirect()->route('user.index')->with('error', 'You do not have permission to update this user');
        }

        $rules = config('Validation')->registrationRules ?? [
            'fullname' => 'required|alpha_space|min_length[3]|max_length[30]',
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username,id,' . $id . ']',
            'email'    => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'phone'    => 'required|numeric|min_length[10]|max_length[15]|is_unique[users.phone,id,' . $id . ']',
            'image'    => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,2048]',
            'group'    => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('editUserErrors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'permit_empty|strong_password',
            'pass_confirm' => 'matches[password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('editUserErrors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge($this->config->validFields, $this->config->personalFields);
        if (! empty($this->request->getPost('password'))) {
            $allowedPostFields[] = 'password';
        }
        $userData = $this->request->getPost($allowedPostFields);
        $user->fill($userData);

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image->isValid() && ! $image->hasMoved()) {
            // Delete the old image if it exists
            if (!empty($user->image) && $user->image !== 'default.png' && file_exists('uploads/users/' . $user->image)) {
                unlink('uploads/users/' . $user->image);
            }

            $newName = $image->getRandomName();
            $image->move('uploads/users', $newName);
            $imagePath = 'uploads/users/' . $newName;
            $image = Image::imagick()->read($imagePath)->scale(150, 150);
            $image->save($imagePath);
            $user->image = $newName;
        }

        // Pastikan user masuk ke grup yang sesuai
        if (! in_groups('superadmin')) {
            // Ambil ID grup 'admin' dan 'user'
            $allowedGroups = $this->groupModel->whereIn('name', ['admin', 'user'])->findAll();
            $allowedGroupIds = array_column($allowedGroups, 'id');

            // Pastikan user hanya bisa memilih 'admin' atau 'user'
            $groupId = $this->request->getPost('group');
            if (!in_array($groupId, $allowedGroupIds)) {
                return redirect()->back()->withInput()->with('editUserErrors', ['group' => 'You can only assign users to Admin or User group.']);
            }
        } else {
            $groupId = $this->request->getPost('group') ?: $this->config->defaultUserGroup;
        }

        if (!empty($groupId)) {
            $this->groupModel->removeUserFromAllGroups($id);
            $this->groupModel->addUserToGroup($id, $groupId);
        }

        if (! $this->userModel->save($user)) {
            return redirect()->back()->withInput()->with('editUserErrors', $this->userModel->errors());
        }

        // Success!
        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);

        if (! $user) {
            return redirect()->route('user.index')->with('error', 'User not found');
        }

        // Check if the user is a superadmin
        $groups = $this->groupModel->getGroupsForUser($user->id);
        if (! in_groups('superadmin') && in_array('superadmin', array_column($groups, 'name'))) {
            return redirect()->route('user.index')->with('error', 'You do not have permission to delete this user');
        }

        if (!empty($user->image) && $user->image !== 'default.png' && file_exists('uploads/users/' . $user->image)) {
            unlink('uploads/users/' . $user->image);
        }

        $this->groupModel->removeUserFromAllGroups($id);
        $this->userModel->delete($id);

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

    public function activate($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            // Check if the user is a superadmin
            $groups = $this->groupModel->getGroupsForUser($user->id);
            if (! in_groups('superadmin') && in_array('superadmin', array_column($groups, 'name'))) {
                return redirect()->route('user.index')->with('error', 'You do not have permission to activate this user');
            }

            $userModel->update($id, ['active' => 1]);
            return redirect()->route('user.index')->with('success', 'User activated successfully.');
        }

        return redirect()->route('user.index')->with('error', 'User not found.');
    }

    public function deactivate($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            // Check if the user is a superadmin
            $groups = $this->groupModel->getGroupsForUser($user->id);
            if (! in_groups('superadmin') && in_array('superadmin', array_column($groups, 'name'))) {
                return redirect()->route('user.index')->with('error', 'You do not have permission to deactivate this user');
            }

            $userModel->update($id, ['active' => 0]);
            return redirect()->route('user.index')->with('success', 'User deactivated successfully.');
        }

        return redirect()->route('user.index')->with('error', 'User not found.');
    }

    public function restore($id)
    {
        $user = $this->userModel->withDeleted()->find($id);

        if (! $user) {
            return redirect()->route('user.index')->with('error', 'User not found');
        }

        if ($this->userModel->restore($id)) {
            return redirect()->route('user.index')->with('success', 'User restored successfully');
        }

        return redirect()->route('user.index')->with('error', 'Failed to restore user');
    }

    public function deletePermanent($id)
    {
        $userModel = new \App\Models\UserModel();

        // Pastikan user memang sudah dihapus (soft delete)
        $user = $userModel->onlyDeleted()->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }

        // Hapus user secara permanen
        $userModel->delete($id, true);

        return redirect()->back()->with('success', 'User permanently deleted!');
    }

    public function deleteAllPermanent()
    {
        $userModel = new UserModel();
        foreach ($userModel->onlyDeleted()->findAll() as $user) {
            if (!empty($user->image) && $user->image !== 'default.png' && file_exists('uploads/users/' . $user->image)) {
                unlink('uploads/users/' . $user->image);
            }
        }

        // Hapus semua user yang memiliki 'deleted_at' tidak null
        $userModel->purgeDeleted();

        return redirect()->back()->with('success', 'All deleted users have been permanently removed.');
    }
}
