const signupLink = document.querySelector(".signup-link");
const signinBlock = document.querySelector(".signin-block");
const signupBlock = document.querySelector(".signup-block");
const signupBack = document.querySelector(".signup-back");

// take forms info
const baseUrl = "http://127.0.0.1:8000/api";
const formsBaseUrl = baseUrl + "/login";

// Sign up link
signupLink.addEventListener("click", () => {
  signinBlock.classList.add("display");
  signupBlock.classList.remove("display");
});

// Back arrow svg in sign up block
signupBack.addEventListener("click", () => {
  signinBlock.classList.remove("display");
  signupBlock.classList.add("display");
});

///////// LOGIN API //////////

const url = formsBaseUrl + "/login";
const email = document.getElementById("username");
const password = document.getElementById("password");
const submit = document.getElementById("signinPageButton");
const error = document.getElementById("error");

submit.addEventListener("click", (e) => {
  e.preventDefault();
  if (!email.value || !password.value) {
    error.textContent = "ALL FIELDS ARE REQUIRED";
    error.classList.remove("display");
    return;
  }
  const formData = new FormData();
  formData.append("email", email.value);
  formData.append("password", password.value);
  axios
    .post(url, formData)
    .then((response) => {
      const data = response.data;
      if (data.error === "none") {
        error.classList.add("dislay");
        localStorage.setItem("userToken", data.access_token);
        window.location.href =
          "http://127.0.0.1:5500/Frontend-datingWebsite/dashboard.html";
      }
    })
    .catch((err) => {
      error.textContent = "WRONG EMAIL OR PASSWORD";
      error.classList.remove("view-none");
    });
});

//////// SERVICES ///////

utils.axiosPost = async (api, data, token = null) => {
  try {
    return await axios.post(utils.baseUrl + api, data, {
      Headers: {
        Authorization: "Bearer " + token,
      },
    });
  } catch (error) {
    console.log("Error from API");
  }
};

utils.axiosGet = async (api) => {
  return await axios.get(utils.baseUrl + api);
};
