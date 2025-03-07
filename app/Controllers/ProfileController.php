<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Config\Auth as AuthConfig;
use App\Entities\User;
use App\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Intervention\Image\ImageManager as Image;

class ProfileController extends BaseController
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
        $this->userModel = new UserModel();
        $this->groupModel = new GroupModel();
    }

    public function index()
    {
        $user = user();
        $groups = $this->groupModel->getGroupsForUser($user->id);
        $user->group = implode(', ', array_column($groups, 'name'));
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('admin/profile', $data);
    }

    public function update()
    {
        $user = user();
        $rules = config('Validation')->registrationRules ?? [
            'fullname' => 'required|alpha_space|min_length[3]|max_length[30]',
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username,id,' . $user->id . ']',
            'email'    => 'required|valid_email|is_unique[users.email,id,' . $user->id . ']',
            'phone'    => 'required|numeric|min_length[10]|max_length[15]|is_unique[users.phone,id,' . $user->id . ']',
            'image'    => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,1024]',

        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('editProfileErrors', $this->validator->getErrors());
        }
        $rules = [
            'password'     => 'permit_empty|strong_password',
            'pass_confirm' => 'matches[password]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('editProfileErrors', $this->validator->getErrors());
        }

        $allowedPostFields = ['fullname', 'username', 'email', 'phone',];
        if (! empty($this->request->getPost('password'))) {
            $allowedPostFields[] = 'password';
        }
        $userData = $this->request->getPost($allowedPostFields);
        $user->fill($userData);

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

        if (! $this->userModel->save($user)) {
            return redirect()->back()->withInput()->with('editProfileErrors', $this->userModel->errors());
        }

        // Success!
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
