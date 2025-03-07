// Ambil base URL dengan lebih fleksibel
const base_url =
  $('meta[name="base_url"]').attr("content") || window.location.origin + "/";
// Validasi logo form (khusus file upload)
$.validator.addMethod(
  "filesize",
  function (value, element, param) {
    return (
      this.optional(element) ||
      (element.files.length > 0 && element.files[0].size <= param * 1024 * 1024)
    );
  },
  "File size must be less than {0}MB"
);

// Fungsi validasi umum untuk semua formulir
function validateForm(formId, rules, messages) {
  $(formId).validate({
    rules: rules,
    messages: messages,
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element) {
      $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element) {
      $(element).removeClass("is-invalid").addClass("is-valid");
    },
  });
}

// Submin spinner
$("form").on("submit", function (e) {
  let form = $(this);
  if (!form.valid()) {
    return;
  }
  form
    .find('button[type="submit"]')
    .html(
      '<span class="spinner-border spinner-border-sm"></span> Processing...'
    )
    .attr("disabled", true);
});

$("form").on("invalid-form.validate", function () {
  $(this).find('button[type="submit"]').attr("disabled", true);
});

// disable submit button when no changes
$("form").on("change keyup", "input, select, textarea", function () {
  $(this).closest("form").find('button[type="submit"]').removeAttr("disabled");
});

// Validasi register form
validateForm(
  "#registerForm",
  {
    fullname: { required: true, minlength: 3, maxlength: 30 },
    username: {
      required: true,
      minlength: 3,
      maxlength: 30,
      remote: {
        url: base_url + "check_username",
        type: "post",
      },
    },
    email: {
      required: true,
      email: true,
      remote: {
        url: base_url + "check_email",
        type: "post",
      },
    },
    phone: {
      required: true,
      digits: true,
      minlength: 10,
      maxlength: 15,
      remote: {
        url: base_url + "check_phone",
        type: "post",
      },
    },
    password: { required: true, minlength: 8 },
    pass_confirm: { required: true, equalTo: "#password" },
  },
  {
    fullname: {
      required: "Please enter your full name",
      minlength: "At least 3 characters",
      maxlength: "Maximum 30 characters",
    },
    username: {
      required: "Enter a username",
      remote: "Username already in use",
    },
    email: {
      required: "Enter an email",
      email: "Invalid email",
      remote: "Email already in use",
    },
    phone: {
      required: "Enter a phone number",
      remote: "Phone number already in use",
    },
    password: {
      required: "Enter a password",
      minlength: "At least 8 characters",
    },
    pass_confirm: { equalTo: "Passwords do not match" },
  }
);

// Validasi Add User form
validateForm(
  "#addUserForm",
  {
    fullname: { required: true, minlength: 3, maxlength: 30 },
    username: {
      required: true,
      minlength: 3,
      maxlength: 30,
      remote: {
        url: base_url + "check_username",
        type: "post",
      },
    },
    email: {
      required: true,
      email: true,
      remote: {
        url: base_url + "check_email",
        type: "post",
      },
    },
    phone: {
      required: true,
      digits: true,
      minlength: 10,
      maxlength: 15,
      remote: {
        url: base_url + "check_phone",
        type: "post",
      },
    },
    password: { required: true, minlength: 8 },
    pass_confirm: { required: true, equalTo: "#password" },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    fullname: {
      required: "Please enter user's full name",
      minlength: "At least 3 characters",
    },
    username: {
      required: "Enter a username",
      remote: "Username already in use",
    },
    email: { required: "Enter an email", remote: "Email already in use" },
    phone: {
      required: "Enter a phone number",
      remote: "Phone number already in use",
    },
    password: {
      required: "Enter a password",
      minlength: "At least 8 characters",
    },
    pass_confirm: { equalTo: "Passwords do not match" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi edit user form
validateForm(
  "#editUserForm",
  {
    fullname: { required: true, minlength: 3, maxlength: 30 },
    username: {
      required: true,
      minlength: 3,
      maxlength: 30,
      remote: {
        url: base_url + "check_username",
        type: "post",
        data: {
          exclude_id: function () {
            return $("#user_id").val() || "0";
          },
        },
      },
    },
    email: {
      required: true,
      email: true,
      remote: {
        url: base_url + "check_email",
        type: "post",
        data: {
          exclude_id: function () {
            return $("#user_id").val() || "0";
          },
        },
      },
    },
    phone: {
      required: true,
      digits: true,
      minlength: 10,
      maxlength: 15,
      remote: {
        url: base_url + "check_phone",
        type: "post",
        data: {
          exclude_id: function () {
            return $("#user_id").val() || "0";
          },
        },
      },
    },
    password: { minlength: 8 },
    pass_confirm: { equalTo: "#password" },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    fullname: {
      required: "Please enter user's full name",
      minlength: "At least 3 characters",
      maxlength: "Maximum 30 characters",
    },
    username: {
      required: "Enter a username",
      remote: "Username already in use",
    },
    email: { required: "Enter an email", remote: "Email already in use" },
    phone: {
      required: "Enter a phone number",
      minlength: "At least 10 digits",
      maxlength: "Maximum 15 digits",
      remote: "Phone number already in use",
    },
    password: { minlength: "At least 8 characters" },
    pass_confirm: { equalTo: "Passwords do not match" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

validateForm(
  "#logo-form",
  {
    logo: { accept: "image/png,image/jpg,image/jpeg,image/webp", filesize: 1 },
  },
  {
    logo: {
      filesize: "Max size is 1MB",
      accept: "Only PNG, JPG, JPEG allowed",
    },
  }
);

validateForm(
  "#favicon-form",
  {
    favicon: {
      accept: "image/png,image/jpg,image/jpeg,image/webp",
      filesize: 1,
    },
  },
  {
    favicon: {
      filesize: "Max size is 1MB",
      accept: "Only PNG, JPG, JPEG allowed",
    },
  }
);

validateForm(
  "#updateInformasiForm",
  {
    alamat: { required: true },
    email: { required: true, email: true },
    telepon1: { required: true, digits: true, minlength: 10, maxlength: 15 },
    telepon2: { digits: true, minlength: 10, maxlength: 15 },
    facebook: { url: true },
    twitter: { url: true },
    instagram: { url: true },
    youtube: { url: true },
    linkedin: { url: true },
  },
  {
    alamat: { required: "Please enter your address" },
    email: { required: "Enter an email", email: "Invalid email" },
    telepon1: {
      required: "Enter a phone number",
      digits: "Only numbers allowed",
      minlength: "At least 10 digits",
      maxlength: "Maximum 15 digits",
    },
    telepon2: {
      digits: "Only numbers allowed",
      minlength: "At least 10 digits",
      maxlength: "Maximum 15 digits",
    },
    facebook: { url: "Invalid URL" },
    twitter: { url: "Invalid URL" },
    instagram: { url: "Invalid URL" },
    youtube: { url: "Invalid URL" },
    linkedin: { url: "Invalid URL" },
  }
);

// Validasi Slider form
validateForm(
  "#addSliderForm",
  {
    title: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    title: { required: "Please enter slider title" },
    description: { required: "Please enter slider description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi edit slider form
validateForm(
  "#editSliderForm",
  {
    title: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    title: { required: "Please enter slider title" },
    description: { required: "Please enter slider description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi Add Keynote Speaker
validateForm(
  "#addKeynoteSpeakerForm",
  {
    name: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    name: { required: "Please enter speaker name" },
    description: { required: "Please enter speaker description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi Edit Keynote Speaker
validateForm(
  "#editKeynoteSpeakerForm",
  {
    name: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    name: { required: "Please enter speaker name" },
    description: { required: "Please enter speaker description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi Add Plenary Speaker
validateForm(
  "#addPlenarySpeakerForm",
  {
    name: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    name: { required: "Please enter speaker name" },
    description: { required: "Please enter speaker description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi Edit Plenary Speaker
validateForm(
  "#editPlenarySpeakerForm",
  {
    name: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    name: { required: "Please enter speaker name" },
    description: { required: "Please enter speaker description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi add Invited Speaker
validateForm(
  "#addInvitedSpeakerForm",
  {
    name: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    name: { required: "Please enter speaker name" },
    description: { required: "Please enter speaker description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi edit Invited Speaker
validateForm(
  "#editInvitedSpeakerForm",
  {
    name: { required: true },
    description: { required: true },
    image: { accept: "image/jpg,image/jpeg,image/png,image/webp", filesize: 1 },
  },
  {
    name: { required: "Please enter speaker name" },
    description: { required: "Please enter speaker description" },
    image: {
      accept: "Only JPG, JPEG, PNG, WEBP allowed",
      filesize: "Max size is 1MB",
    },
  }
);

// Validasi Add Timeline
validateForm(
  "#addTimelineForm",
  {
    title: { required: true },
    description: { required: true },
    date: { required: true, date: true },
  },
  {
    title: { required: "Please enter timeline title" },
    description: { required: "Please enter timeline description" },
    date: { required: "Please enter timeline date", date: "Invalid date" },
  }
);

// Validasi Edit Timeline
validateForm(
  "#editTimelineForm",
  {
    title: { required: true },
    description: { required: true },
    date: { required: true, date: true },
  },
  {
    title: { required: "Please enter timeline title" },
    description: { required: "Please enter timeline description" },
    date: { required: "Please enter timeline date", date: "Invalid date" },
  }
);

// Validasi Add Topic
validateForm(
  "#addTopicForm",
  {
    title: { required: true },
    description: { required: true },
  },
  {
    title: { required: "Please enter timeline title" },
    description: { required: "Please enter timeline description" },
  }
);

// Validasi Edit Topic
validateForm(
  "#editTopicForm",
  {
    title: { required: true },
    description: { required: true },
  },
  {
    title: { required: "Please enter timeline title" },
    description: { required: "Please enter timeline description" },
  }
);

// Validasi Add Scope & Focuses
validateForm(
  "#addScopeFocusForm",
  {
    scope_name: { required: true },
    "focuses[]": { required: true, minlength: 1 },
  },
  {
    scope_name: { required: "Please enter scope name" },
    "focuses[]": {
      required: "Please enter at least one focus",
      minlength: "Please enter at least one focus",
    },
  }
);

// Validasi Edit Scope & Focuses
validateForm(
  "#editScopeFocusForm",
  {
    scope_name: { required: true },
    "focuses[]": { required: true, minlength: 1 },
  },
  {
    scope_name: { required: "Please enter scope name" },
    "focuses[]": {
      required: "Please enter at least one focus",
      minlength: "Please enter at least one focus",
    },
  }
);

// Validasi Add Document
// Validasi Tambah Dokumen
validateForm(
  "#addDocumentForm",
  {
    document_name: { required: true },
    document_file: {
      required: true,
      accept:
        "application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      filesize: 10,
    },
  },
  {
    document_name: { required: "Please enter document name" },
    document_file: {
      accept: "Only PDF, DOCX, and XLSX allowed",
      filesize: "Max size is 10MB",
    },
  }
);

// Validasi Edit Dokumen
validateForm(
  "#editDocumentForm",
  {
    document_name: { required: true },
    document_file: {
      accept:
        "application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      filesize: 10,
    },
  },
  {
    document_name: { required: "Please enter document name" },
    document_file: {
      accept: "Only PDF, DOCX, and XLSX allowed",
      filesize: "Max size is 10MB",
    },
  }
);

// Validasi add Itinerary schedule
validateForm(
  "#addItineraryScheduleForm",
  {
    title: { required: true },
    document: { required: true, accept: "application/pdf", filesize: 10 },
  },
  {
    title: { required: "Please enter itinerary title" },
    document: {
      required: "Please upload itinerary document",
      accept: "Only PDF allowed",
      filesize: "Max size is 10MB",
    },
  }
);

// Validasi edit Itinerary schedule
validateForm(
  "#editItineraryScheduleForm",
  {
    title: { required: true },
    document: { accept: "application/pdf", filesize: 10 },
  },
  {
    title: { required: "Please enter itinerary title" },
    document: {
      accept: "Only PDF allowed",
      filesize: "Max size is 10MB",
    },
  }
);

// Validasi Add Submission Template
validateForm(
  "#addSubmissionTemplateForm",
  {
    title: { required: true },
    document: {
      required: true,
      accept:
        "application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document",
      filesize: 10,
    },
  },
  {
    title: { required: "Please enter template title" },
    document: {
      required: "Please upload template document",
      accept: "Only PDF, DOC, and DOCX allowed",
      filesize: "Max size is 10MB",
    },
  }
);

// Validasi Edit Submission Template
validateForm(
  "#editSubmissionTemplateForm",
  {
    title: { required: true },
    document: {
      accept:
        "application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document",
      filesize: 10,
    },
  },
  {
    title: { required: "Please enter template title" },
    document: {
      accept: "Only PDF, DOC, and DOCX allowed",
      filesize: "Max size is 10MB",
    },
  }
);

// Tampilkan/hide spinner secara efisien
$('input[type="text"], input[type="email"], input[type="tel"]').on(
  "keyup",
  function () {
    let spinner = $(this).closest(".form-group").find(".spinner");
    spinner.removeClass("d-none");
    clearTimeout($(this).data("timer"));

    let wait = setTimeout(() => {
      spinner.addClass("d-none");
    }, 500);
    $(this).data("timer", wait);
  }
);
