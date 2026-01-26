<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NECCAW Steering Committee Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 flex items-center justify-center p-4">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-green-800 to-emerald-600 text-white text-center px-6 py-10">
            <h1 class="text-2xl md:text-3xl font-bold">NECCAW Steering Committee</h1>
            <p class="opacity-90 mt-2 text-sm md:text-base">
                Confirmation of Interest & Commitment
            </p>
        </div>

        <div class="p-6 md:p-10">

            <!-- PROGRESS -->
            <div class="w-full h-2 bg-gray-200 rounded-full mb-8">
                <div id="progressFill" class="h-full w-0 bg-green-600 rounded-full transition-all"></div>
            </div>

            <form id="form" method="POST" action="{{ route('neccaw.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- STEP 1 -->
                <div class="step active" data-step="1">

                    <div class="mb-4">
                        <label class="block font-semibold text-green-700">Full Name *</label>
                        <input id="name" name="name" type="text"
                            class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-green-700">Email *</label>
                        <input id="email" name="email" type="email"
                            class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-green-700">NGO / Organization *</label>
                        <input id="org" name="organization" type="text"
                            class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-green-700">Are you interested? *</label>

                        <label
                            class="flex items-center gap-2 p-3 mt-2 border rounded-lg cursor-pointer hover:bg-green-50">
                            <input type="radio" name="interest" value="yes"> Yes
                        </label>

                        <label
                            class="flex items-center gap-2 p-3 mt-2 border rounded-lg cursor-pointer hover:bg-green-50">
                            <input type="radio" name="interest" value="no"> No
                        </label>
                    </div>

                    <p id="err1" class="text-red-600 hidden">Please complete all fields</p>

                    <button type="button" onclick="nextStep()"
                        class="mt-6 bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-semibold w-full">
                        Continue
                    </button>

                </div>

                <!-- STEP 2 -->
                <div class="step hidden" data-step="2">

                    <label class="block font-semibold text-green-700 mb-2">Experience & Expertise *</label>

                    <textarea id="experience" name="experience" rows="5"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none"></textarea>

                    <p id="err2" class="text-red-600 hidden">Required</p>

                    <div class="mt-8 flex flex-col md:flex-row gap-4">
                        <button type="button" onclick="prevStep()"
                            class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold">
                            Back
                        </button>

                        <button type="button" onclick="nextStep()"
                            class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-semibold">
                            Continue
                        </button>
                    </div>

                </div>

                <!-- STEP 3 -->
                <div class="step hidden" data-step="3">

                    <label class="block font-semibold text-green-700 mb-2">Commitments *</label>

                    <label class="flex items-center gap-2 p-3 border rounded-lg cursor-pointer hover:bg-green-50">
                        <input type="checkbox" name="commitments[]" value="meetings"> Attend meetings
                    </label>

                    <label class="flex items-center gap-2 p-3 mt-2 border rounded-lg cursor-pointer hover:bg-green-50">
                        <input type="checkbox" name="commitments[]" value="representation"> Represent NECCAW
                    </label>

                    <label class="flex items-center gap-2 p-3 mt-2 border rounded-lg cursor-pointer hover:bg-green-50">
                        <input type="checkbox" name="commitments[]" value="strategy"> Support strategy
                    </label>

                    <p id="err3" class="text-red-600 hidden">Select all</p>

                    <div class="mt-8 flex flex-col md:flex-row gap-4">
                        <button type="button" onclick="prevStep()"
                            class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold">
                            Back
                        </button>

                        <button type="button" onclick="nextStep()"
                            class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-semibold">
                            Continue
                        </button>
                    </div>

                </div>

                <!-- STEP 4 -->
                <div class="step hidden" data-step="4">

                    <label class="block font-semibold text-green-700">Upload Portrait Photo *</label>

                    <input type="file" id="photo" name="photo" class="mt-2 w-full" onchange="preview(this)">

                    <img id="img" class="mt-4 w-32 rounded-lg hidden">

                    <p id="err4" class="text-red-600 hidden">Photo required</p>

                    <div class="mt-8 flex flex-col md:flex-row gap-4">
                        <button type="button" onclick="prevStep()"
                            class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold">
                            Back
                        </button>

                        <button type="button" onclick="nextStep()"
                            class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-semibold">
                            Continue
                        </button>
                    </div>

                </div>

                <!-- STEP 5 -->
                <div class="step hidden" data-step="5">

                    <label class="block font-semibold text-green-700">Short Bio *</label>

                    <textarea id="bio" name="bio" rows="6" maxlength="700" oninput="countChar()"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none"></textarea>

                    <p id="counter" class="text-right text-sm text-gray-500">0 / 700</p>

                    <p id="err5" class="text-red-600 hidden">Bio required</p>

                    <div class="mt-8 flex flex-col md:flex-row gap-4">
                        <button type="button" onclick="prevStep()"
                            class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold">
                            Back
                        </button>

                        <button type="button" onclick="nextStep()"
                            class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-semibold">
                            Continue
                        </button>
                    </div>

                </div>

                <!-- STEP 6 -->
                <div class="step hidden" data-step="6">

                    <label class="block font-semibold text-green-700">Additional Comments</label>

                    <textarea name="comments" rows="4"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none"></textarea>

                    <div class="mt-8 flex flex-col md:flex-row gap-4">
                        <button type="button" onclick="prevStep()"
                            class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-lg font-semibold">
                            Back
                        </button>

                        <button type="submit"
                            class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-semibold">
                            Submit
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    <script>
/* ===========================
   GLOBAL STATE
=========================== */
let step = 1;
const total = 6;

/* ===========================
   SHOW STEP
=========================== */
function showStep(n) {

  document.querySelectorAll(".step")
    .forEach(el => el.classList.add("hidden"));

  document
    .querySelector(`[data-step="${n}"]`)
    .classList.remove("hidden");

  document.getElementById("progressFill")
    .style.width = (n / total * 100) + "%";

  step = n;
}

/* ===========================
   NEXT STEP
=========================== */
function nextStep() {

  // If user selects NO in step 1 → submit directly
  if (step === 1) {
    let interest = document.querySelector(
      'input[name="interest"]:checked'
    );

    if (interest && interest.value === "no") {
      document.getElementById("form").submit();
      return;
    }
  }

  if (!validate()) return;

  showStep(step + 1);
}

/* ===========================
   PREVIOUS STEP
=========================== */
function prevStep() {
  showStep(step - 1);
}

/* ===========================
   VALIDATION
=========================== */
function validate() {

  /* STEP 1 */
  if (step === 1) {

    let nameVal  = document.getElementById("name").value.trim();
    let emailVal = document.getElementById("email").value.trim();
    let orgVal   = document.getElementById("org").value.trim();

    let interest =
      document.querySelector('input[name="interest"]:checked');

    if (
      nameVal === "" ||
      emailVal === "" ||
      orgVal === "" ||
      !interest
    ) {
      err1.classList.remove("hidden");
      return false;
    }

    err1.classList.add("hidden");
  }

  /* STEP 2 */
  if (step === 2) {

    let exp =
      document.getElementById("experience").value.trim();

    if (exp.length < 10) {
      err2.classList.remove("hidden");
      return false;
    }

    err2.classList.add("hidden");
  }

  /* STEP 3 */
  if (step === 3) {

    let checks =
      document.querySelectorAll(
        'input[name="commitments[]"]:checked'
      );

    if (checks.length < 3) {
      err3.classList.remove("hidden");
      return false;
    }

    err3.classList.add("hidden");
  }

  /* STEP 4 */
  if (step === 4) {

    let photoInput =
      document.getElementById("photo");

    if (photoInput.files.length === 0) {
      err4.classList.remove("hidden");
      return false;
    }

    err4.classList.add("hidden");
  }

  /* STEP 5 */
  if (step === 5) {

    let bioVal =
      document.getElementById("bio").value.trim();

    if (bioVal.length < 20) {
      err5.classList.remove("hidden");
      return false;
    }

    err5.classList.add("hidden");
  }

  return true;
}

/* ===========================
   IMAGE PREVIEW
=========================== */
function preview(input) {

  if (!input.files.length) return;

  let reader = new FileReader();

  reader.onload = function(e) {
    img.src = e.target.result;
    img.classList.remove("hidden");
  }

  reader.readAsDataURL(input.files[0]);
}

/* ===========================
   BIO COUNTER
=========================== */
function countChar() {
  counter.textContent =
    `${document.getElementById("bio").value.length} / 700`;
}

/* ===========================
   INIT
=========================== */
document.addEventListener("DOMContentLoaded", () => {
  showStep(1);
});
</script>



</body>

</html>
