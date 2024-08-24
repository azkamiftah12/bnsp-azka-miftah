<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    @yield('content')
    @if (session('success'))
        <div id="toast-success"
            class="toast flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow mx-8 slide-in"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div id="toast-danger"
            class="toast flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow mx-8 slide-in"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const hideToast = (id) => {
                const toast = document.querySelector(id);
                if (toast) {
                    setTimeout(() => {
                        toast.classList.remove('slide-in');
                        toast.classList.add('slide-out');
                        setTimeout(() => {
                            toast.classList.add('hidden');
                        }, 3000);
                    }, 10000);
                }
            };
            hideToast('#toast-success');
            hideToast('#toast-danger');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinsiSelect = document.getElementById('provinsi_id');
            const kabupatenSelect = document.getElementById('kabupaten_id');
            const kabupatenOptions = Array.from(kabupatenSelect.options);


            function filterKabupaten() {
                const selectedProvinsi = provinsiSelect.value;

                kabupatenSelect.innerHTML = '';
                kabupatenOptions.forEach(option => {
                    if (option.getAttribute('data-provinsi') == selectedProvinsi) {
                        kabupatenSelect.appendChild(option);
                    }
                });
            }

            const provinsiLahirSelect = document.getElementById('provinsi_lahir');
            const kabupatenLahirSelect = document.getElementById('kabupaten_lahir');
            const kabupatenLahirOptions = Array.from(kabupatenLahirSelect.options);

            function filterKabupatenLahir() {
                const selectedProvinsiLahir = provinsiLahirSelect.value;

                kabupatenLahirSelect.innerHTML = '';
                kabupatenLahirOptions.forEach(option => {
                    if (option.getAttribute('data-provinsi-lahir') == selectedProvinsiLahir) {
                        kabupatenLahirSelect.appendChild(option);
                    }
                });
            }

            // Initial filtering based on the pre-selected provinsi
            filterKabupaten();
            filterKabupatenLahir();

            // Filter kabupaten when provinsi changes
            provinsiSelect.addEventListener('change', filterKabupaten);
            provinsiLahirSelect.addEventListener('change', filterKabupatenLahir);



            const kewarganegaraanSelect = document.getElementById('kewarganegaraan');
            const kewarganegaraanInputDiv = document.getElementById('kewarganegaraan-input-div');

            function toggleKewarganegaraanInput() {
                if (kewarganegaraanSelect.value === 'WNA') {
                    kewarganegaraanInputDiv.style.display = 'block';
                } else {
                    kewarganegaraanInputDiv.style.display = 'none';
                }
            }

            // Initial check based on the pre-selected value
            toggleKewarganegaraanInput();

            // Toggle the input field when the user changes the selection
            kewarganegaraanSelect.addEventListener('change', toggleKewarganegaraanInput);


            const pilihTempatLahir = document.getElementById('pilih-tempat-lahir');
            const dalamNegeriFields = document.getElementById('dalam-negeri-fields');
            const luarNegeriFields = document.getElementById('luar-negeri-fields');

            function toggleTempatLahirFields() {
                if (pilihTempatLahir.value === 'dalam-negeri') {
                    dalamNegeriFields.style.display = 'block';
                    luarNegeriFields.style.display = 'none';
                } else if (pilihTempatLahir.value === 'luar-negeri') {
                    dalamNegeriFields.style.display = 'none';
                    luarNegeriFields.style.display = 'block';
                }
            }

            // Initial check based on the pre-selected value
            toggleTempatLahirFields();

            // Toggle the fields when the user changes the selection
            pilihTempatLahir.addEventListener('change', toggleTempatLahirFields);
        });
    </script>
</body>

</html>
