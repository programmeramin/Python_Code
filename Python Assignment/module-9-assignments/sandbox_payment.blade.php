<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->siteName }}</title>
    <meta name="description" content="{{ $settings->siteDescription }}">
    <link rel="shortcut icon" href="{{ $settings->faviconImage }}" type="image/x-icon">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/0dfc93affd.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        #scrollContainer,
        #body-scroll {
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }

        #scrollContainer::-webkit-scrollbar,
        #body-scroll::-webkit-scrollbar {
            width: 2px !important;
            height: 2px !important;
        }

        #scrollContainer::-webkit-scrollbar-track,
        #body-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        #scrollContainer::-webkit-scrollbar-thumb,
        #body-scroll::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        #scrollContainer::-webkit-scrollbar-thumb:hover,
        #body-scroll::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .active {
            background: linear-gradient(90deg, #203dab, #370d6c);
        }

        .active_modile {
            border: 1px dotted linear-gradient(90deg, #203dab, #370d6c);
            background: linear-gradient(90deg, #203dab, #370d6c);
            color: white;
        }

        .loader {
            border: 4px solid rgba(156, 156, 156, 0.795);
            border-top-color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
            display: inline-block;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-white">
    @php
    $postmanOnly = $postmanOnly ?? false;
    $hasHashPayment = isset($data) && !empty($data->hash);
    $showPostmanPanel = $postmanOnly || !$hasHashPayment;
    @endphp
    <div
        class="max-w-[1500px] mx-auto px-4 my-5 md:my-10 {{ $showPostmanPanel ? 'grid grid-cols-1 xl:grid-cols-2 gap-6 items-start' : 'flex justify-center' }}">
        @if ($showPostmanPanel)
        <section class="w-full border border-gray-300 rounded-md bg-gray-950 text-white p-4 md:p-6 space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-lg md:text-xl font-semibold">Postman Sandbox</h2>
                <span class="text-xs bg-green-700 px-2 py-1 rounded">Request Panel</span>
            </div>
            <p class="text-sm text-gray-300">
                Use this section to send test API requests and check JSON response before using the checkout UI.
            </p>
            <div class="space-y-3">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                    <select id="pm_method"
                        class="bg-gray-900 border border-gray-700 rounded px-3 py-2 text-sm outline-none focus:border-blue-500">
                        <option value="POST" selected>POST</option>
                    </select>
                    <input id="pm_url" type="text" value="{{ url('/') }}/api/sandbox/v1/create_payment"
                        class="md:col-span-3 bg-gray-900 border border-gray-700 rounded px-3 py-2 text-sm outline-none focus:border-blue-500" />
                </div>
                <div class="border border-gray-700 rounded bg-black/40 overflow-hidden">
                    <div class="border-b border-gray-700 flex items-center text-sm">
                        <button type="button" onclick="togglePmTab('params')"
                            class="pm-tab-btn px-4 py-2 border-r border-gray-700 bg-gray-900 text-white"
                            data-tab="params">
                            Params
                        </button>
                        <button type="button" onclick="togglePmTab('headers')"
                            class="pm-tab-btn px-4 py-2 border-r border-gray-700 text-gray-300 hover:text-white"
                            data-tab="headers">
                            Headers
                        </button>
                        <button type="button" onclick="togglePmTab('body')"
                            class="pm-tab-btn px-4 py-2 text-gray-300 hover:text-white" data-tab="body">
                            Body
                        </button>
                    </div>

                    <div id="pm_params_panel" class="p-3 space-y-2">
                        <div class="grid grid-cols-12 gap-2 text-xs text-gray-400 px-1">
                            <div class="col-span-1">On</div>
                            <div class="col-span-5">Key</div>
                            <div class="col-span-6">Value</div>
                        </div>
                        <div class="pm-param-row grid grid-cols-12 gap-2 items-center">
                            <input type="checkbox" class="col-span-1 pm-param-enabled" />
                            <input type="text"
                                class="col-span-5 pm-param-key bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                placeholder="reference" />
                            <input type="text"
                                class="col-span-6 pm-param-value bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                placeholder="huffuf1xss2q13feess425s6fee" />
                        </div>
                        <div class="pm-param-row grid grid-cols-12 gap-2 items-center">
                            <input type="checkbox" class="col-span-1 pm-param-enabled" />
                            <input type="text"
                                class="col-span-5 pm-param-key bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                placeholder="optional_param" />
                            <input type="text"
                                class="col-span-6 pm-param-value bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                placeholder="value" />
                        </div>
                    </div>

                    <div id="pm_headers_panel" class="p-3 space-y-2 hidden">
                        <div class="grid grid-cols-12 gap-2 text-xs text-gray-400 px-1">
                            <div class="col-span-1">On</div>
                            <div class="col-span-5">Key</div>
                            <div class="col-span-6">Value</div>
                        </div>

                        <div class="pm-header-row grid grid-cols-12 gap-2 items-center">
                            <input type="checkbox" class="col-span-1 pm-header-enabled" checked />
                            <input type="text"
                                class="col-span-5 pm-header-key bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                value="Accept" />
                            <input type="text"
                                class="col-span-6 pm-header-value bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                value="application/json" />
                        </div>
                        <div class="pm-header-row grid grid-cols-12 gap-2 items-center">
                            <input type="checkbox" class="col-span-1 pm-header-enabled" checked />
                            <input type="text"
                                class="col-span-5 pm-header-key bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                value="Content-Type" />
                            <input type="text"
                                class="col-span-6 pm-header-value bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                value="application/json" />
                        </div>
                        <div class="pm-header-row grid grid-cols-12 gap-2 items-center">
                            <input type="checkbox" class="col-span-1 pm-header-enabled" checked />
                            <input type="text"
                                class="col-span-5 pm-header-key bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                value="X-SECRET-KEY" />
                            <input type="text"
                                class="col-span-6 pm-header-value bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                placeholder="your-secret-key" />
                        </div>
                        <div class="pm-header-row grid grid-cols-12 gap-2 items-center">
                            <input type="checkbox" class="col-span-1 pm-header-enabled" />
                            <input type="text"
                                class="col-span-5 pm-header-key bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                placeholder="Custom-Header" />
                            <input type="text"
                                class="col-span-6 pm-header-value bg-gray-900 border border-gray-700 rounded px-2 py-2 text-xs"
                                placeholder="Header value" />
                        </div>
                    </div>

                    <div id="pm_body_panel" class="p-3 space-y-2 hidden">
                        <div class="flex items-center gap-4 text-xs text-gray-300">
                            <label class="flex items-center gap-1">
                                <input type="radio" name="pm_body_mode" value="none" />
                                none
                            </label>
                            <label class="flex items-center gap-1">
                                <input type="radio" name="pm_body_mode" value="raw" checked />
                                raw
                            </label>
                            <select id="pm_body_raw_type"
                                class="bg-gray-900 border border-gray-700 rounded px-2 py-1 text-xs outline-none focus:border-blue-500">
                                <option value="json" selected>JSON</option>
                                <option value="text">Text</option>
                            </select>
                        </div>
                        <textarea id="pm_body" rows="12"
                            class="w-full bg-gray-900 border border-gray-700 rounded px-3 py-2 text-xs outline-none focus:border-blue-500">{
                            "currency": "BDT",
                            "amount": 350,
                            "reference": "huffuf1xss2q13feess425s6fee",
                            "callback_url": "http://yourwebsitelink.com",
                            "redirect_url": "https://freezing-insurance-40.webhook.cool",
                            "customer_name": "zahid hasan",
                            "customer_email": "coo.bangladeshisoftware@gmail.com",
                            "customer_phone": "01550723203",
                            "customer_address": "Dinajpur",
                            "product": "{\"product name\": \"orange\"}",
                            "note": ""
                            }
                        </textarea>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button id="pm_send" onclick="sendPostmanRequest()"
                        class="bg-indigo-600 hover:bg-indigo-500 transition px-4 py-2 rounded text-sm font-medium">
                        Send Request
                    </button>
                    <span id="pm_status" class="text-xs text-gray-300"></span>
                </div>
                <div class="border border-gray-700 rounded bg-black/40">
                    <div class="px-3 py-2 border-b border-gray-700 text-sm text-gray-200">Response Output</div>
                    <pre id="pm_output"
                        class="p-3 text-xs overflow-auto max-h-[320px] text-green-300">Response will appear here...</pre>
                </div>
            </div>
        </section>
        @endif

        @if (!$postmanOnly)
        <section class="w-[100vw] max-w-md mx-auto  flex items-center justify-center my-0">
            <div class="border-2 border-purple-400 rounded-[4px] w-full pb-2.5 space-y-5">
                <div class="border-b border-gray-300 px-3 py-3 bg-gradient-to-br from-purple-50 to-blue-50">
                    <div class="flex justify-start items-start gap-2 md:gap-5">
                        <img src="{{ isset($paymentSetting) && $paymentSetting->company_logo ? asset(ltrim($paymentSetting->company_logo, '/')) : asset('images/default_logo.png') }}"
                            alt="Company Logo" class="w-[80px] md:w-[100px] object-fill h-fit mt-2 rounded">
                        <div class="">
                            <h3
                                class="text-[18px] md:text-[24px] font-bold text-purple-600 grid grid-cols-1 break-words">
                                {{ isset($paymentSetting) && !empty($paymentSetting->payment_title) ?
                                $paymentSetting->payment_title : 'Gateway Name' }}
                            </h3>

                            <div class="flex flex items-center gap-2 md:gap-5">
                                <a href="{{ $paymentSetting->support ?? '#' }}" target="_blank"
                                    class="text-sm flex flex-col items-center p-1 cursor-pointer rounded transition-transform duration-300  hover:scale-110 text-purple-600 hover:text-purple-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14"
                                        fill="currentColor">
                                        <path
                                            d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z" />
                                    </svg>
                                    <p>Support</p>
                                </a>
                                <a href="{{ $paymentSetting->faq ?? '#' }}" target="_blank"
                                    class="text-sm flex flex-col items-center p-1 cursor-pointer rounded transition-transform duration-300  hover:scale-110 text-purple-600 hover:text-purple-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="14" height="14"
                                        fill="currentColor">
                                        <path
                                            d="M80 160c0-35.3 28.7-64 64-64l32 0c35.3 0 64 28.7 64 64l0 3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74l0 1.4c0 17.7 14.3 32 32 32s32-14.3 32-32l0-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7l0-3.6c0-70.7-57.3-128-128-128l-32 0C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                    </svg>
                                    <p>Faq</p>
                                </a>
                                <a href="{{ $paymentSetting->gift ?? '#' }}" target="_blank"
                                    class="text-sm flex flex-col items-center p-1 cursor-pointer rounded transition-transform duration-300  hover:scale-110 text-purple-600 hover:text-purple-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14"
                                        fill="currentColor">
                                        <path
                                            d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z" />
                                    </svg>
                                    <p>Gift</p>
                                </a>
                                <a href="{{ $paymentSetting->login_link ?? '#' }}" target="_blank"
                                    class="text-sm flex flex-col items-center p-1 cursor-pointer rounded transition-transform duration-300  hover:scale-110 text-purple-600 hover:text-purple-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14"
                                        fill="currentColor">
                                        <path
                                            d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                                    </svg>
                                    <p>Login</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($paymentSetting)
                <div class='space-y-4' style="margin-top:0px !important;">
                    @if ($paymentSetting->payment_type == 'system')
                    <div class="relative w-full">

                        <!-- Left Button -->
                        <button onclick="scrollContainer('left')"
                            class="md:hidden block absolute left-0 top-1/2 -translate-y-1/2 bg-black/40 text-white px-2 py-1 rounded-full z-10">
                            &#10094;
                        </button>

                        <!-- Scrollable Container -->
                        <div id="scrollContainer"
                            class="max-w-full overflow-x-auto flex items-center gap-4 bg-gradient-to-r from-purple-500 to-blue-600 text-white px-8 scroll-smooth">

                            @if (!empty($international['stripe']) || !empty($international['sebl']))
                            <div id="international"
                                class="flex items-center active justify-center gap-2 cursor-pointer p-2 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-globe" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z" />
                                </svg>
                                <h3 class="md:text-md text-sm">Visa</h3>
                            </div>
                            @endif

                            @if (!empty($payments['bkash']) || !empty($payments['nagad']))
                            <div id="modile" class="flex items-center justify-center gap-2 cursor-pointer p-2 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20"
                                    fill="white">
                                    <path
                                        d="M16 64C16 28.7 44.7 0 80 0L304 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L80 512c-35.3 0-64-28.7-64-64L16 64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64L80 64l0 320 224 0 0-320z" />
                                </svg>
                                <h3 class="md:text-md text-sm">MFS </h3>
                            </div>
                            @endif

                            @if ($manual->count() > 0)
                            <div id="manual" class="flex items-center justify-center gap-2 cursor-pointer p-2 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20"
                                    fill="white">
                                    <path
                                        d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm48 160l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM96 336c0-8.8 7.2-16 16-16l352 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-352 0c-8.8 0-16-7.2-16-16zM376 160l80 0c13.3 0 24 10.7 24 24l0 48c0 13.3-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24l0-48c0-13.3 10.7-24 24-24z" />
                                </svg>
                                <h3 class="md:text-md text-sm">Bank</h3>
                            </div>
                            @endif

                            @if (!empty($banglaQrCode['banglaQr']))
                            <div id="bangla-qr"
                                class="flex items-center justify-center gap-2 cursor-pointer p-2 w-full">
                                <svg viewBox="0 0 100 100" width="20" height="20">
                                    <!-- QR code path data -->
                                    <path d="M10,10 h80 v80 h-80 Z" fill="white" />
                                    <path d="M30,30 h40 v40 h-40 Z" fill="black" />
                                </svg>
                                <h3 class="md:text-md text-sm">Bangla&nbsp;QR</h3>
                            </div>
                            @endif

                        </div>

                        <!-- Right Button -->
                        <button onclick="scrollContainer('right')"
                            class="md:hidden block absolute right-0 top-1/2 -translate-y-1/2 bg-black/40 text-white px-2 py-1 rounded-full z-10">
                            &#10095;
                        </button>

                    </div>
                    @else
                    <div class="relative w-full spacey-y-4">

                        <!-- Left Button -->
                        <button onclick="scrollContainer('left')"
                            class="md:hidden block absolute left-0 top-1/2 -translate-y-1/2 bg-black/40 text-white px-2 py-1 rounded-full z-10">
                            &#10094;
                        </button>

                        <!-- Scrollable Container -->
                        <div id="scrollContainer"
                            class="max-w-full overflow-x-auto flex items-center gap-4 bg-gradient-to-r from-purple-500 to-blue-600 text-white px-8 scroll-smooth">

                            @if (!empty($payments['bkash']) || !empty($payments['nagad']))
                            <div id="modile"
                                class="flex items-center justify-center gap-2 cursor-pointer p-2 w-full active">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20"
                                    fill="white">
                                    <path
                                        d="M16 64C16 28.7 44.7 0 80 0L304 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L80 512c-35.3 0-64-28.7-64-64L16 64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64L80 64l0 320 224 0 0-320z" />
                                </svg>
                                <h3 class="md:text-md text-sm">MFS </h3>
                            </div>
                            @endif

                            <div id="internet" class="flex flex-col items-center cursor-pointer p-2 w-full hidden">
                                <i class="fa-solid fa-globe text-2xl"></i>
                                <h3 class="md:text-md text-sm">Internet Banking</h3>
                            </div>
                            <div id="credit" class="flex flex-col items-center cursor-pointer p-2 w-full hidden">
                                <i class="fa-solid fa-credit-card text-2xl"></i>
                                <h3 class="md:text-md text-sm">Debit/Credit Card</h3>
                            </div>
                            @if (count($p2p_networks) > 0 &&
                            isset($paymentSetting) &&
                            $paymentSetting->p2p_payment_active !== null &&
                            $paymentSetting->p2p_payment_active !== '' &&
                            $paymentSetting->p2p_payment_active == 1 &&
                            $p2p_all_group_status == 1)
                            <div id="agent" class="flex items-center justify-center gap-2 cursor-pointer p-2 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20"
                                    fill="white">
                                    <path
                                        d="M320 464c8.8 0 16-7.2 16-16l0-288-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16l256 0zM0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 448c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64z" />
                                </svg>
                                <h3 class="md:text-md text-sm">Apps&nbsp;MFS</h3>
                            </div>
                            @endif
                            @if ($manual->count() > 0)
                            <div id="manual" class="flex items-center justify-center gap-2 cursor-pointer p-2 w-full ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20"
                                    fill="white">
                                    <path
                                        d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm48 160l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM96 336c0-8.8 7.2-16 16-16l352 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-352 0c-8.8 0-16-7.2-16-16zM376 160l80 0c13.3 0 24 10.7 24 24l0 48c0 13.3-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24l0-48c0-13.3 10.7-24 24-24z" />
                                </svg>
                                <h3 class="md:text-md text-sm">Manual</h3>
                            </div>
                            @endif

                            @if (!empty($international['stripe']) || !empty($international['sebl']))
                            <div id="international"
                                class="flex items-center justify-center gap-2 cursor-pointer p-2 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-globe" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z" />
                                </svg>
                                <h3 class="md:text-md text-sm">Visa</h3>
                            </div>
                            @endif
                        </div>

                        <!-- Right Button -->
                        <button onclick="scrollContainer('right')"
                            class="md:hidden block absolute right-0 top-1/2 -translate-y-1/2 bg-black/40 text-white px-2 py-1 rounded-full z-10">
                            &#10095;
                        </button>

                    </div>
                    @endif
                </div>

                <!-- all payment option are preview in bottom  -->
                <div class='space-y-2 max-h-[37vh] overflow-y-scroll py-2' id="body-scroll">
                    <div>
                        <div id="open-mobile"
                            class="grid grid-cols-2 md:grid-cols-3 gap-2 sm:gap-4 px-0 sm:px-0 md:px-4 mt-6">
                            @if ($payments['bkash'] == 1)
                            <div id="bkash"
                                class="w-full  h-[120px] cursor-pointer flex flex-col items-center justify-center border rounded-lg shadow-md transition-transform duration-300 hover:scale-110 ">
                                <Image class="w-16 h-16 mb-3 rounded-2xl" src="/images/bkash.png" alt="Bkash" />
                                <h3 class="text-sm font-medium">Bkash</h3>
                            </div>
                            @endif

                            @if ($payments['nagad'] == 1)
                            <div id="nagad"
                                class="w-full h-[120px] flex flex-col items-center justify-center border rounded-lg shadow-md transition-transform duration-300 hover:scale-110 cursor-pointer">
                                <Image class="w-16 h-16 mb-2 rounded-2xl" src="/images/nagad.png" alt="Nagad" />
                                <h3 class="text-sm font-medium">Nagad</h3>
                            </div>
                            @endif

                            <div id="upay"
                                class="w-full h-[120px] flex flex-col items-center justify-center border border-gray-200 rounded-lg shadow-sm bg-white transition-transform duration-300 hover:scale-105 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 cursor-pointer hidden">
                                <Image class="w-16 h-16 mb-2" src="/images/Upay.png" alt="Upay" />
                                <h3 class="text-sm font-medium text-gray-700">Upay</h3>
                            </div>

                            <div id="rocket"
                                class="w-full h-[120px] flex flex-col items-center justify-center border border-gray-200 rounded-lg shadow-sm bg-white transition-transform duration-300 hover:scale-105 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 cursor-pointer hidden">
                                <Image class="w-16 h-16 mb-2" src="/images/rocket.png" alt="rocket" />
                                <h3 class="text-sm font-medium text-gray-700">Rocket</h3>
                            </div>
                        </div>
                        <!-- start -->
                        @if (!empty($international['stripe']) || !empty($international['sebl']))
                        <div id="open-international"
                            class="grid grid-cols-2 mt-0 mb-4 px-5 md:grid-cols-3 gap-4 sm:gap-6">
                            @if (!empty($international['stripe']))
                            <div id="stripe"
                                class="w-full h-[120px] cursor-pointer flex flex-col items-center justify-center border rounded-lg shadow-md transition-transform duration-300 hover:scale-110 ">
                                <Image class="w-16 h-16 mb-3 rounded-2xl" src="/images/stripe.png" alt="Bkash" />
                                <h3 id="stripe_text" class="text-sm font-medium">Stripe</h3>
                            </div>
                            @endif
                            @if (!empty($international['sebl']))
                            <div id="sebl"
                                class="w-full h-[120px] cursor-pointer flex flex-col items-center justify-center border rounded-lg shadow-md transition-transform duration-300 hover:scale-110 ">
                                <Image class="w-16 h-16 mb-3" src="/images/sebl.png" alt="SEBL" />
                                <h3 id="sebl_text" class="text-sm font-medium">SEBL</h3>
                            </div>
                            @endif
                        </div>
                        @endif
                        <!-- end -->
                        <!-- bangla qr tab -->
                        @if ($paymentSetting->payment_type == 'system' && !empty($banglaQrCode['banglaQr']))
                        <div id="open-bangla" class="flex items-center justify-center gap-4 sm:gap-6">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1UA-RNBzfbFgVg3sWZWoZoJwkEAc6jy5OtA&s"
                                class="mx-auto" alt="Bangla Qr" />
                        </div>
                        @endif
                        <!-- internet tab -->
                        <div id="open-internet"
                            class="grid hidden grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 px-4 sm:px-6 md:px-8 mt-6">
                            <div
                                class="w-full h-[120px] flex flex-col items-center justify-center border border-gray-200 rounded-lg shadow-sm bg-white transition-transform duration-300 hover:scale-105 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 cursor-pointer">
                                <img class="w-16 h-16 mb-2 rounded-2xl" src='/images/dbbl.jpg' alt="DBBL" />
                                <h3 class="text-sm font-medium text-gray-700">DBBL</h3>
                            </div>
                            <div
                                class="w-full h-[120px] flex flex-col items-center justify-center border border-gray-200 rounded-lg shadow-sm bg-white transition-transform duration-300 hover:scale-105 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 cursor-pointer">
                                <img class="w-16 h-16 mb-2 rounded-2xl" src='/images/bank_asia.png' alt="Bank Asia" />
                                <h3 class="text-sm font-medium text-gray-700">Bank Asia</h3>
                            </div>
                            <div
                                class="w-full h-[120px] flex flex-col items-center justify-center border border-gray-200 rounded-lg shadow-sm bg-white transition-transform duration-300 hover:scale-105 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 cursor-pointer">
                                <img class="w-16 h-16 mb-2 rounded-2xl" src='/images/islami.png' alt="Islami Bank" />
                                <h3 class="text-sm font-medium text-gray-700">Islami Bank</h3>
                            </div>
                            <div
                                class="w-full h-[120px] flex flex-col items-center justify-center border border-gray-200 rounded-lg shadow-sm bg-white transition-transform duration-300 hover:scale-105 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-500 cursor-pointer">
                                <img class="w-16 h-16 mb-2 rounded-2xl" src='/images/city-bank.png' alt="City Bank" />
                                <h3 class="text-sm font-medium text-gray-700">City Bank</h3>
                            </div>
                        </div>

                    </div>
                    <div class="mt-10 hidden" id="open-credit">
                        <div
                            class="w-[90%] flex justify-center text-center focus-within:border focus-within:border-blue-500 rounded-sm bg-gray-100 items-center mt-5 ml-6">
                            <i class="fa-brands fa-cc-amazon-pay text-blue-900 ml-2 text-xl"></i>
                            <input type="phone" placeholder="Card Number" value=""
                                class="outline-none py-2 px-3 ml-0 bg-gray-100 rounded-sm w-full" />
                        </div>

                        <div class="w-[90%] flex justify-between gap-2 mt-10 text-center mx-auto">
                            <div
                                class="w-[60%] flex text-center focus-within:border focus-within:border-blue-500 rounded-sm bg-gray-100 items-center">
                                <input type="date" placeholder="Card Number" value=""
                                    class="outline-none py-2 px-3 rounded-sm w-full bg-gray-100" />
                            </div>

                            <div
                                class="w-[50%] flex gap-2 text-center focus-within:border focus-within:border-blue-500 rounded-sm bg-gray-100 items-center">
                                <FaBarcode fontSize={40} class="text-black ml-2" />
                                <input type="phone" placeholder="CVC/CVV" value=""
                                    class="outline-none py-2 px-3 rounded-sm w-full mr-6 bg-gray-100" />
                            </div>
                        </div>

                        <div
                            class="w-[90%] flex justify-center text-center focus-within:border focus-within:border-blue-500 rounded-sm bg-gray-100 items-center mt-10 ml-6">
                            <ImProfile fontSize={25} class="text-black ml-2" />
                            <input type="name" placeholder="Card Holder" value=""
                                class="outline-none py-2 px-3 ml-0 bg-gray-100 rounded-sm w-full" />
                        </div>
                    </div>

                    @if (count($p2p_networks) > 0 &&
                    isset($paymentSetting) &&
                    $paymentSetting->p2p_payment_active !== null &&
                    $paymentSetting->p2p_payment_active !== '' &&
                    $paymentSetting->p2p_payment_active == 1)
                    <div id="open-agent" class="hidden px-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                            @foreach ($p2p_networks as $item)
                            <div id="agent_{{ $item['name'] }}"
                                class="agent-item w-full h-[120px] cursor-pointer flex flex-col items-center justify-center border rounded-lg shadow-md transition-transform duration-300 hover:scale-110 relative"
                                data-name="{{ $item['name'] }}">
                                <!-- Added data-name -->

                                <Image class="w-16 h-16 mb-3 rounded-2xl" src="{{ $item['logo'] }}"
                                    alt="{{ $item['name'] }}" />
                                <h3 class="agent-name text-sm font-medium text-black">
                                    {{ ucfirst(strtolower($item['name'])) }}</h3> <!-- Default black text -->

                                <!-- Close Button -->
                                <div
                                    class="close-btn hidden absolute top-0 right-0 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20"
                                        fill="white">
                                        <path
                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                    </svg>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="agent-fields" class="mt-5 flex justify-center items-center flex-col w-full"
                            style="display:none;">
                        </div>
                    </div>
                    @endif

                    @if ($manual->count() > 0)
                    <div id="open-manual" class="hidden px-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                            @foreach ($manual as $item)
                            <div id="manual_{{ $item->id }}" data-default_currency="{{ $item->default_currency }}"
                                class="manual-item w-full h-[120px] cursor-pointer flex flex-col items-center justify-center border rounded-lg shadow-md transition-transform duration-300 hover:scale-110 relative"
                                data-id="{{ $item->id }}">
                                <Image class="w-16 h-16 mb-3 rounded-2xl" src="{{ $item->image }}"
                                    alt="{{ $item->payment_method_name }}" />
                                <h3 class="text-sm font-medium">
                                    {{ ucfirst(strtolower($item->payment_method_name)) }}</h3>
                                <div
                                    class="close-btn hidden absolute top-0 right-0 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20"
                                        fill="white">
                                        <path
                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                    </svg>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="fields" class="mt-5 flex justify-center items-center flex-col w-full"
                            style="display:none;">
                        </div>
                    </div>
                    @endif
                    @if ($manual->count() > 0)
                    <div id="open-manual" class="hidden">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 px-4 sm:px-6 md:px-8 mt-6"
                            id="manual-grid">
                            @foreach ($manual as $item)
                            <div id="manual_{{ $item->id }}" data-default_currency="{{ $item->default_currency }}"
                                class="manual-item w-full h-[120px] flex flex-col items-center justify-center border rounded-lg shadow-md transition-transform duration-300 hover:scale-110 relative"
                                data-id="{{ $item->id }}">
                                <Image class="w-16 h-16 rounded-2xl mb-3" src="{{ $item->image }}"
                                    alt="{{ $item->payment_method_name }}" />
                                <h3 class="text-sm font-medium">{{ $item->payment_method_name }}</h3>
                                <!-- Close Button -->
                                <div
                                    class="close-btn hidden absolute top-0 right-0 bg-red-500 text-white w-7 h-7 flex items-center justify-center rounded-full cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20"
                                        fill="white">
                                        <path
                                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                    </svg>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="fields" class="mt-5 flex justify-center items-center flex-col w-full"
                            style="display:none;">
                        </div>
                    </div>
                    @endif

                    @if (
                    $manual->count() > 0 ||
                    (!empty($payments['bkash']) ||
                    (count($p2p_networks) > 0 &&
                    isset($paymentSetting) &&
                    $paymentSetting->p2p_payment_active !== null &&
                    $paymentSetting->p2p_payment_active !== '' &&
                    $paymentSetting->p2p_payment_active == 1) ||
                    !empty($payments['nagad']) ||
                    !empty($international['stripe']) ||
                    !empty($international['sebl']) ||
                    !empty($banglaQrCode['banglaQr'])))
                    <div class="relative w-full mx-auto px-4 mt-5">
                        <div
                            class="flex flex-wrap sm:flex-nowrap items-stretch bg-gray-50 border border-gray-300 rounded-md focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 overflow-hidden">

                            <input id="amount_input" type="text" required placeholder="Amount"
                                value="{{ $data->amount }}" readonly
                                class="flex-1 min-w-0 py-2 px-3 bg-gray-50 outline-none" />

                            <span id="displayed_currency"
                                class="flex items-center px-3 text-sm text-gray-500 border-l border-gray-300 whitespace-nowrap">
                                {{ $data->currency }}
                            </span>

                            <button id="copy_button" onclick="copyAmount()"
                                class="flex items-center justify-center gap-2 px-3 py-2 text-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 whitespace-nowrap hidden sm:flex">

                                <span id="copy_icon">
                                    <!-- SVG unchanged -->
                                </span>
                                <span id="copy_text">Copy</span>
                            </button>

                        </div>

                        <select id="currency_select" style="visibility:hidden;"
                            class="sm:w-28 mt-2 sm:absolute sm:right-0 sm:top-full sm:mt-1 py-1 px-2 bg-white border border-gray-300 rounded-md text-gray-600 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="{{ $data->currency }}" selected>{{ $data->currency }}</option>
                        </select>
                    </div>


                    <div id="exchange_rate" style="width:calc(100% - 16%);"
                        class="w-full max-w-lg mx-6 mt-3 text-sm text-gray-600 hidden">
                        <div>Exchange Rate: <span id="rate" class="font-medium text-gray-800"></span></div>
                        <div>Converted Amount: <span id="converted_amount" class="font-medium text-gray-800"></span>
                        </div>
                    </div>

                    <div class="mt-16 mx-auto w-[96%] overflow-y-hidden flex gap-2 items-center justify-center">
                        <button id="payment"
                            class="bg-gradient-to-r from-purple-500 to-blue-600 hover:via-blue-500 hover:from-purple-500 hover:to-blue-600 p-3 transition-all w-full rounded font-md text-lg text-white">
                            Pay Now
                        </button>
                        <div id="loadingSpinner"
                            class="bg-gradient-to-r from-purple-500 to-blue-600 p-3 w-full rounded font-md text-lg text-white flex gap-2 items-center justify-center"
                            style="display: none;">
                            <div class="loader"></div> Processing...
                        </div>
                    </div>
                    @else
                    <p class="text-lg text-purple-600 text-center py-4">
                        Please configure your payment settings.
                    </p>
                    @endif
                </div>
                @endif


            </div>
        </section>
        @else
        <section id="pm_preview_section"
            class="w-full border-2 border-purple-400 rounded-[4px] bg-white overflow-hidden hidden">
            <div class="border-b border-gray-300 px-4 py-3 bg-gradient-to-br from-purple-50 to-blue-50">
                <h3 class="text-lg font-semibold text-purple-700">Payment Preview</h3>
                <p class="text-sm text-gray-600">Returned `payment_url` will open here.</p>
            </div>
            <iframe id="pm_payment_iframe" src="" class="w-full h-[780px] bg-white" title="Payment Preview"></iframe>
        </section>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function togglePmTab(tabName) {
            const paramsPanel = document.getElementById("pm_params_panel");
            const headersPanel = document.getElementById("pm_headers_panel");
            const bodyPanel = document.getElementById("pm_body_panel");
            const tabButtons = document.querySelectorAll(".pm-tab-btn");

            tabButtons.forEach((btn) => {
                if (btn.getAttribute("data-tab") === tabName) {
                    btn.classList.add("bg-gray-900", "text-white");
                    btn.classList.remove("text-gray-300");
                } else {
                    btn.classList.remove("bg-gray-900", "text-white");
                    btn.classList.add("text-gray-300");
                }
            });

            if (tabName === "params") {
                paramsPanel?.classList.remove("hidden");
                headersPanel?.classList.add("hidden");
                bodyPanel?.classList.add("hidden");
            } else if (tabName === "headers") {
                paramsPanel?.classList.add("hidden");
                headersPanel?.classList.remove("hidden");
                bodyPanel?.classList.add("hidden");
            } else {
                paramsPanel?.classList.add("hidden");
                headersPanel?.classList.add("hidden");
                bodyPanel?.classList.remove("hidden");
            }
        }

        async function sendPostmanRequest() {
            const method = document.getElementById("pm_method")?.value || "POST";
            const url = document.getElementById("pm_url")?.value?.trim();
            const bodyText = document.getElementById("pm_body")?.value?.trim() || "{}";
            const bodyMode = document.querySelector('input[name="pm_body_mode"]:checked')?.value || "raw";
            const rawType = document.getElementById("pm_body_raw_type")?.value || "json";
            const output = document.getElementById("pm_output");
            const status = document.getElementById("pm_status");
            const sendButton = document.getElementById("pm_send");

            if (!url) {
                if (status) status.textContent = "Please provide a request URL.";
                return;
            }

            let finalUrl = url;
            try {
                const urlObject = new URL(url, window.location.origin);
                const paramRows = document.querySelectorAll(".pm-param-row");
                paramRows.forEach((row) => {
                    const enabled = row.querySelector(".pm-param-enabled")?.checked;
                    const key = row.querySelector(".pm-param-key")?.value?.trim();
                    const value = row.querySelector(".pm-param-value")?.value?.trim();
                    if (enabled && key) {
                        urlObject.searchParams.set(key, value ?? "");
                    }
                });
                finalUrl = urlObject.toString();
            } catch (_) {
                finalUrl = url;
            }

            const headers = {};
            const headerRows = document.querySelectorAll(".pm-header-row");
            headerRows.forEach((row) => {
                const enabled = row.querySelector(".pm-header-enabled")?.checked;
                const key = row.querySelector(".pm-header-key")?.value?.trim();
                const value = row.querySelector(".pm-header-value")?.value?.trim();
                if (enabled && key && value) {
                    headers[key] = value;
                }
            });

            let requestBody = undefined;
            if (method !== "GET" && bodyMode === "raw") {
                if (rawType === "json") {
                    try {
                        JSON.parse(bodyText);
                    } catch (error) {
                        if (status) status.textContent = "Invalid JSON body.";
                        if (output) output.textContent = String(error);
                        return;
                    }
                }
                requestBody = bodyText;
            }

            try {
                if (status) status.textContent = "Sending...";
                if (sendButton) {
                    sendButton.disabled = true;
                    sendButton.classList.add("opacity-70", "cursor-not-allowed");
                }

                const response = await fetch(finalUrl, {
                    method,
                    headers,
                    body: requestBody
                });

                let responseData;
                try {
                    responseData = await response.json();
                } catch (_) {
                    responseData = await response.text();
                }

                if (status) {
                    status.textContent = `Status: ${response.status} ${response.statusText}`;
                }
                if (output) {
                    output.textContent = typeof responseData === "string" ?
                        responseData :
                        JSON.stringify(responseData, null, 2);
                }

                const paymentUrl = responseData?.data?.payment_url || responseData?.payment_url;
                if (paymentUrl) {
                    const previewSection = document.getElementById("pm_preview_section");
                    const previewFrame = document.getElementById("pm_payment_iframe");
                    if (previewSection && previewFrame) {
                        previewFrame.src = paymentUrl;
                        previewSection.classList.remove("hidden");
                    }
                }
            } catch (error) {
                if (status) status.textContent = "Request failed.";
                if (output) output.textContent = String(error);
            } finally {
                if (sendButton) {
                    sendButton.disabled = false;
                    sendButton.classList.remove("opacity-70", "cursor-not-allowed");
                }
            }
        }

        @if (!$postmanOnly)
        function scrollContainer(direction) {
            const container = document.getElementById('scrollContainer');
            const amount = 200;

            container.scrollBy({
                left: direction === 'left' ? -amount : amount,
                behavior: 'smooth'
            });
        }

        function copyAmount() {
            const amountInput = document.getElementById("amount_input");
            const copyButton = document.getElementById("copy_button");
            const copyIcon = document.getElementById("copy_icon");
            const copyText = document.getElementById("copy_text");

            if (!amountInput || !copyIcon || !copyText) {
                console.error("One or more elements not found!");
                return;
            }

            if (amountInput.value) {
                copyText.textContent = "Working...";

                // Change to Spinner Icon
                copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" fill="white">
                <path d="M256 32a224 224 0 1 1-158.6 382.6 24 24 0 1 1 34.1-33.8A176 176 0 1 0 80 256a24 24 0 0 1-48 0 224 224 0 0 1 224-224z"/>
            </svg>`;

                // Copy to Clipboard
                navigator.clipboard.writeText(amountInput.value).then(
                    () => {
                        copyText.textContent = "Copied";

                        // Change to Check Icon
                        copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" fill="white">
                        <path d="M173.9 439.4L7 273.4l40.2-40.2 126.7 126.7L464.8 68.4l40.2 40.2L173.9 439.4z"/>
                    </svg>`;

                        setTimeout(() => {
                            copyText.textContent = "Copy";

                            // Reset to Clipboard Icon
                            copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" fill="white">
                            <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0zM64 112c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16l-16 0 0 24c0 13.3-10.7 24-24 24l-88 0-88 0c-13.3 0-24-10.7-24-24l0-24-16 0zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                        </svg>`;
                        }, 2000);
                    },
                    (err) => {
                        console.error("Failed to copy text: ", err);
                        copyText.textContent = "Failed";

                        // Change to Error Icon
                        copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" fill="white">
                        <path d="M256 48C141.3 48 48 141.3 48 256s93.3 208 208 208 208-93.3 208-208S370.7 48 256 48zm16 288a16 16 0 1 1-32 0V176a16 16 0 1 1 32 0v160zm-16 80a24 24 0 1 1 0-48 24 24 0 1 1 0 48z"/>
                    </svg>`;
                    }
                );
            } else {
                alert("No value to copy!");

                // Change to Warning Icon
                copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" fill="white">
                <path d="M256 32a224 224 0 1 1-158.6 382.6 24 24 0 1 1 34.1-33.8A176 176 0 1 0 80 256a24 24 0 0 1-48 0 224 224 0 0 1 224-224z"/>
            </svg>`;

                setTimeout(() => {
                    copyText.textContent = "Copy";

                    // Reset to Clipboard Icon
                    copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" fill="white">
                    <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0z"/>
                </svg>`;
                }, 2000);
            }
        }


        document.addEventListener("DOMContentLoaded", () => {
            const manualItems = document.querySelectorAll(".manual-item");

            manualItems.forEach((item) => {
                const closeButton = item.querySelector(".close-btn");

                // Add click event for selecting a card
                item.addEventListener("click", () => {
                    // Hide all other cards and show close button for the selected one
                    manualItems.forEach((otherItem) => {
                        if (otherItem !== item) {
                            otherItem.classList.add("hidden");
                        } else {
                            closeButton.classList.remove("hidden");
                        }
                    });
                    // Show the fields container
                    document.getElementById("fields").style.display = "block";
                });

                // Add click event for the close button
                closeButton.addEventListener("click", (event) => {
                    event.stopPropagation(); // Prevent triggering the parent card click

                    // Remove 'active' class from all items and hide the fields container
                    $(".manual-item").not(this).removeClass("active");
                    // Show all cards and hide close button
                    manualItems.forEach((otherItem) => {
                        otherItem.classList.remove("hidden");
                    });
                    // Hide the fields container and close button
                    document.getElementById("fields").style.display = "none";
                    closeButton.classList.add("hidden");
                });
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const manualItems = document.querySelectorAll(".manual-item");

            manualItems.forEach((item) => {
                const closeButton = item.querySelector(".close-btn");

                // Add click event for selecting a card
                item.addEventListener("click", () => {
                    // Hide all other cards and show close button for the selected one
                    manualItems.forEach((otherItem) => {
                        if (otherItem !== item) {
                            otherItem.classList.add("hidden");
                        } else {
                            closeButton.classList.remove("hidden");
                        }
                    });
                    // Show the fields container
                    document.getElementById("fields").style.display = "block";
                });

                // Add click event for the close button
                closeButton.addEventListener("click", (event) => {
                    event.stopPropagation(); // Prevent triggering the parent card click

                    // Remove 'active' class from all items and hide the fields container
                    $(".manual-item").not(this).removeClass("active");
                    // Show all cards and hide close button
                    manualItems.forEach((otherItem) => {
                        otherItem.classList.remove("hidden");
                    });
                    // Hide the fields container and close button
                    document.getElementById("fields").style.display = "none";
                    closeButton.classList.add("hidden");
                });
            });
        });

        function showToast(type, message) {
            switch (type) {
                case "success":
                    toastr.success(message);
                    break;
                case "error":
                    toastr.error(message);
                    break;
                case "info":
                    toastr.info(message);
                    break;
                case "warning":
                    toastr.warning(message);
                    break;
            }
        }

        $(document).ready(function() {
            $(document).on("click", ".manual-item", function() {
                const manualId = $(this).data("id");

                if (manualId === undefined || manualId === null) {
                    console.error("Manual ID is not defined.");
                    return;
                }

                const fieldsContainer = $("#fields");
                $(".manual-item").not(this).removeClass("active");
                fieldsContainer.hide();
                fieldsContainer.empty();
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                } else {
                    fetchFields(manualId);
                    $(this).addClass("active");
                    fieldsContainer.show();
                }
            });
        });

        function fetchFields(manualId) {
            const user_id = @json($data)?.user_id;
            let payment_method = "{{ $paymentSetting->payment_type ?? 'self' }}"
            $.ajax({
                url: `/manual-fields/${manualId}/${user_id}/${payment_method}`,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    const fieldsContainer = $("#fields");
                    fieldsContainer.empty();

                    // Display static details with copy button
                    const staticDetails = `
                <div class="field-item w-full px-6 pt-4 text-black text-md font-semibold ">
                    <div class="mb-3 flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <span>Wallet Address: </span>
                            <span id="wallet_address_${manualId}" class="text-red-600 wallet">
                                ${data.data.wallets[0]?.wallet_number? data.data.wallets[0]?.wallet_number : data?.data?.wallet_address || "Not Available"}
                            </span>
                            <button
                                id="copy_button_${manualId}"
                                onclick="copyToClipboard('${data.data.wallets[0]?.wallet_number? data.data.wallets[0]?.wallet_number : data?.data?.wallet_address || "Not Available"}', ${manualId})"
                                class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center gap-2"
                            >
                               <span id="copy_icon_${manualId}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" fill="white">
                                        <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0zM64 112c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16l-16 0 0 24c0 13.3-10.7 24-24 24l-88 0-88 0c-13.3 0-24-10.7-24-24l0-24-16 0zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                                    </svg>
                                </span> 
                                <span id="copy_text_${manualId}">Copy</span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <span>Payment Direction: </span>
                        <span>${data.data.payment_direction || ""}</span>
                    </div>
                </div>
                `;
                    fieldsContainer.append(staticDetails);

                    // Check if there are info_keys to display
                    if (data.info_keys && data.info_keys.length > 0) {
                        $.each(data.info_keys, function(index, info) {
                            const fieldDiv = $("<div>", {
                                class: "field-item w-full px-6 my-3",
                            });
                            fieldDiv.html(`
                            <label for="field_${index}" class="block text-md font-semibold mb-1">${info.info_keys} <small class="text-red-500"> (required)</small></label>
                            <input
                                type="text"
                                id="field_${index}"
                                placeholder="${info.info_keys}"
                                name="info_keys[${index}]"
                                value="${info.value || ""}"
                                class="outline-none py-2 px-3 bg-gray-50 rounded-md w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            />
                        `);
                            fieldsContainer.append(fieldDiv);
                        });
                    } else {
                        fieldsContainer.append(
                            '<p class="text-gray-600">No additional information available.</p>'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching fields:", xhr.responseText);
                },
            });
        }
        // Function to copy Wallet Address to clipboard and change text/icon
        function copyToClipboard(value, manualId) {
            // Get the elements based on manualId
            const copyButton = document.getElementById(`copy_button_${manualId}`);
            const copyIcon = document.getElementById(`copy_icon_${manualId}`);
            const copyText = document.getElementById(`copy_text_${manualId}`);
            if (value) {
                copyText.textContent = "Working...";
                // Copy the value to the clipboard
                navigator.clipboard.writeText(value).then(
                    () => {
                        // Change text and icon on success
                        copyText.textContent = "Copied";
                        // Change to Check Icon
                        copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 512 512" fill="white">
                        <path d="M173.9 439.4L7 273.4l40.2-40.2 126.7 126.7L464.8 68.4l40.2 40.2L173.9 439.4z"/>
                    </svg>`;

                        // Reset the button text and icon after 2 seconds
                        setTimeout(() => {
                            copyText.textContent = "Copy";
                            // Reset to Clipboard Icon
                            copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" fill="white">
                            <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0zM64 112c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16l-16 0 0 24c0 13.3-10.7 24-24 24l-88 0-88 0c-13.3 0-24-10.7-24-24l0-24-16 0zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                        </svg>`;
                        }, 2000);
                    },
                    (err) => {
                        console.error("Failed to copy text: ", err);
                        // Change to Error Icon
                        copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 512 512" fill="white">
                        <path d="M256 48C141.3 48 48 141.3 48 256s93.3 208 208 208 208-93.3 208-208S370.7 48 256 48zm16 288a16 16 0 1 1-32 0V176a16 16 0 1 1 32 0v160zm-16 80a24 24 0 1 1 0-48 24 24 0 1 1 0 48z"/>
                    </svg>`;
                    }
                );
            } else {
                alert("No value to copy!");
                copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" fill="white">
                <path d="M256 32a224 224 0 1 1-158.6 382.6 24 24 0 1 1 34.1-33.8A176 176 0 1 0 80 256a24 24 0 0 1-48 0 224 224 0 0 1 224-224z"/>
            </svg>`;

                setTimeout(() => {
                    copyText.textContent = "Copy";

                    // Reset to Clipboard Icon
                    copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" fill="white">
                    <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0z"/>
                </svg>`;
                }, 2000);
            }
        }

        const p2p_group = @json($p2p_group_settings);
        const p2p_networks = @json($p2p_networks);

        function toggleAgentsByGroup() {

            p2p_networks?.forEach(method => {
                const key = `p2p_wallet_group_${method.name.toLowerCase()}`;
                const agentElement = document.getElementById(`agent_${method.name}`);

                if (agentElement) {
                    if (p2p_group[key] === "1") {
                        agentElement.classList.remove("hidden");
                    } else {
                        agentElement.classList.add("hidden");
                    }
                }
            });
        }

        toggleAgentsByGroup()

        // agent all function 
        $(document).ready(function() {
            $(document).on("click", ".agent-item", function() {
                const agentName = $(this).data("name");

                $(".agent-item").removeClass("active");
                $(this).addClass("active");

                $(".agent-name").removeClass("text-white").addClass("text-black");
                $(this).find(".agent-name").removeClass("text-black").addClass("text-white");

                $(".close-btn").addClass("hidden");
                $(this).find(".close-btn").removeClass("hidden");

                // hide all except selected, but without .hide()
                $(".agent-item").each(function() {
                    if (!$(this).hasClass("active")) {
                        $(this).addClass("hidden");
                    }
                });

                agentFetchFields(agentName);
                $("#agent-fields").show();
            });

            $(document).on("click", ".close-btn", function(event) {
                event.stopPropagation();

                $(".agent-item").removeClass("active");
                $(".agent-name").addClass("text-white");
                $(".close-btn").addClass("hidden");
                $("#agent-fields").hide();

                // reset hidden class by group setting
                toggleAgentsByGroup();
            });
        });

        function agentFetchFields(agentName) {
            const user_id = @json($data)?.user_id;
            $.ajax({
                url: `/p2p_wallet/${agentName}/${user_id}`,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    const agentFieldsContainer = $("#agent-fields");
                    agentFieldsContainer.empty();

                    // ?????? ????? ??? ??? 
                    let agentNumber = data || "Not Available";

                    const staticDetails = `
                    <div id="static_details_${agentName}" class="field-item w-full text-black text-md font-semibold">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span>Agent Number: </span>
                                <span id="agent_number_${agentName}" class="agent-number text-blue-600 font-bold">
                                    ${agentNumber}
                                </span>
                                <button
                                    id="copy_button_${agentName}"
                                    onclick="agentCopyToClipboard('${agentNumber}', '${agentName}')"
                                    class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center gap-2"
                                >
                                    <span id="copy_icon_${agentName}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" fill="white">
                                            <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0zM64 112c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16l-16 0 0 24c0 13.3-10.7 24-24 24l-88 0-88 0c-13.3 0-24-10.7-24-24l0-24-16 0zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                                        </svg>
                                    </span> 
                                    <span id="copy_text_${agentName}">Copy</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label for="transaction_id_${agentName}" class="block text-md font-semibold mb-1">
                                Transaction ID <small class="text-red-500">(required)</small>
                            </label>
                            <input type="text" id="transaction_id_${agentName}" placeholder="Transaction ID" 
                                name="transaction_id" 
                                value="" 
                                class="outline-none transaction_id py-2 px-3 bg-gray-100 rounded-sm text-md w-full" />
                        </div>
                        <div class="mt-2">
                            <label for="sender_number_${agentName}" class="block text-md font-semibold mb-1">
                                Sender Number <small class="text-red-500">(required)</small>
                            </label>
                            <input type="text" id="sender_number_${agentName}" placeholder="Sender Number" 
                                name="sender_number" 
                                value="" 
                                class="outline-none sender_number py-2 px-3 bg-gray-100 rounded-sm text-md w-full" />
                        </div>
                    </div>
                `;

                    agentFieldsContainer.append(staticDetails);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching fields:", xhr.responseText);
                },
            });
        }

        function agentCopyToClipboard(value, agentName) {
            // Get the elements based on manualId
            const copyButton = document.getElementById(`copy_button_${agentName}`);
            const copyIcon = document.getElementById(`copy_icon_${agentName}`);
            const copyText = document.getElementById(`copy_text_${agentName}`);

            if (value) {
                copyText.textContent = "Working...";
                // Copy the value to the clipboard
                navigator.clipboard.writeText(value).then(
                    () => {
                        // Change text and icon on success
                        copyText.textContent = "Copied";
                        // Change to Check Icon
                        copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 512 512" fill="white">
                        <path d="M173.9 439.4L7 273.4l40.2-40.2 126.7 126.7L464.8 68.4l40.2 40.2L173.9 439.4z"/>
                    </svg>`;

                        // Reset the button text and icon after 2 seconds
                        setTimeout(() => {
                            copyText.textContent = "Copy";
                            // Reset to Clipboard Icon
                            copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" fill="white">
                            <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0zM64 112c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16l-16 0 0 24c0 13.3-10.7 24-24 24l-88 0-88 0c-13.3 0-24-10.7-24-24l0-24-16 0zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                        </svg>`;
                        }, 2000);
                    },
                    (err) => {
                        console.error("Failed to copy text: ", err);
                        // Change to Error Icon
                        copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 512 512" fill="white">
                        <path d="M256 48C141.3 48 48 141.3 48 256s93.3 208 208 208 208-93.3 208-208S370.7 48 256 48zm16 288a16 16 0 1 1-32 0V176a16 16 0 1 1 32 0v160zm-16 80a24 24 0 1 1 0-48 24 24 0 1 1 0 48z"/>
                    </svg>`;
                    }
                );
            } else {
                alert("No value to copy!");
                copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 512 512" fill="white">
                <path d="M256 32a224 224 0 1 1-158.6 382.6 24 24 0 1 1 34.1-33.8A176 176 0 1 0 80 256a24 24 0 0 1-48 0 224 224 0 0 1 224-224z"/>
            </svg>`;

                setTimeout(() => {
                    copyText.textContent = "Copy";

                    // Reset to Clipboard Icon
                    copyIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 384 512" fill="white">
                    <path d="M280 64l40 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 128C0 92.7 28.7 64 64 64l40 0 9.6 0C121 27.5 153.3 0 192 0s71 27.5 78.4 64l9.6 0z"/>
                </svg>`;
                }, 2000);
            }
        }

        const $modile = $("#modile");
        const $internet = $("#internet");
        const $international = $("#international");
        const $openInternational = $("#open-international");
        const $stripe = $("#stripe");
        const $sebl = $("#sebl");
        const $credit = $("#credit");
        const $manual = $("#manual");
        const $bangla = $("#bangla-qr");
        const $agent = $("#agent");
        const $openMobile = $("#open-mobile");
        const $openInternet = $("#open-internet");
        const $openCredit = $("#open-credit");
        const $openManual = $("#open-manual");
        const $openBangla = $("#open-bangla");
        const $openAgent = $("#open-agent");
        const $amount = $("#amount");
        const $bkash = $("#bkash");
        const $nagad = $("#nagad");
        const $upay = $("#upay");
        const $rocket = $("#rocket");
        const $stripe_text = $("#stripe_text");
        const $sebl_text = $("#sebl_text");
        const paymentMethods = [$bkash, $nagad, $upay, $rocket]; // Manual payments handled separately

        // Set initial states
        var bkash = @json($payments['bkash'] ?? null);
        var nagad = @json($payments['nagad'] ?? null);
        var rocket = @json($payments['rocket'] ?? null);
        var upay = @json($payments['upay'] ?? null);
        if (!bkash && !nagad && !rocket && !upay) {
            $openManual.removeClass("hidden");
            $amount.removeClass("hidden");
            $manual.addClass("active");
            $internet.removeClass("active");
            $modile.removeClass("active");
            $agent.removeClass("active");
        }
        var agent = @json($p2p_networks ?? null);

        if (agent?.length > 0 && !bkash && !nagad && !rocket && !upay) {
            $openAgent.removeClass("hidden");
            $amount.removeClass("hidden");
            $agent.addClass("active");
            $internet.removeClass("active");
            $modile.removeClass("active");
            $manual.addClass("active");
            $openManual.addClass("hidden");
        }

        // start
        var MANUAL = {{ $manual->count() > 0 ? 'true' : 'false' }};
        //   var P2P_AGENT = {{ count($p2p_networks) > 0 ? 'true' : 'false' }};
        var P2P_AGENT =
            {{ isset($paymentSetting) &&
            $paymentSetting->payment_type !== 'system' &&
            count($p2p_networks) > 0 &&
            $paymentSetting->p2p_payment_active !== null &&
            $paymentSetting->p2p_payment_active !== '' &&
            $paymentSetting->p2p_payment_active == 1 &&
            $p2p_all_group_status == 1
                ? 'true'
                : 'false' }};

        var VISA_INTERNATIONAL = {{ !empty($international['stripe']) || !empty($international['sebl']) ? 'true' : 'false' }};
        var QR = {{ !empty($banglaQrCode['banglaQr']) ? 'true' : 'false' }};
        var P2C = {{ ($payments['bkash'] ?? 0) == 1 ? 'true' : 'false' }};
        var P2C_NAGAD = {{ ($payments['nagad'] ?? 0) == 1 ? 'true' : 'false' }};
        // console.log('MANUAL:: ', MANUAL);
        // console.log('P2P_AGENT:: ', P2P_AGENT);
        // console.log('VISA_INTERNATIONAL:: ', VISA_INTERNATIONAL);
        // console.log('QR:: ', QR);
        // console.log('P2C:: ', P2C);
        // console.log('P2C_NAGAD:: ', P2C_NAGAD);

        let active_type = "{{ $paymentSetting->payment_type ?? 'self' }}";

        function InitActiveScreen() {
            if (active_type == 'system') {
                // 01
                if (VISA_INTERNATIONAL) {
                    triggerInternational();
                    return;
                }
                if (P2C || P2C_NAGAD) {
                    triggerP2C();
                    return;
                }
                if (MANUAL) {
                    triggerManual();
                    return;
                }
                if (QR) {
                    triggerQRCode();
                    return;
                }
            } else {
                if (P2C || P2C_NAGAD) {
                    triggerP2C();
                    return;
                }
                if (P2P_AGENT) {
                    triggerAgent();
                    return;
                }
                if (MANUAL) {
                    triggerManual();
                    return;
                }
                if (VISA_INTERNATIONAL) {
                    triggerInternational(); // first
                    return;
                }
            }
        }
        InitActiveScreen();

        $modile.on("click", () => {
            triggerP2C();
        })

        function triggerP2C() {
            $('#stripe').removeClass("active_modile");
            $('#sebl').removeClass("active_modile");
            $openMobile.removeClass("hidden");
            $openInternet.addClass("hidden");
            $openCredit.addClass("hidden");
            $openBangla.addClass("hidden");
            $("#bangla-qr").removeClass("active");
            $openManual.addClass("hidden");
            $stripe_text.css("color", "#000000f2");
            $sebl_text.css("color", "#000000f2");
            $openAgent.addClass("hidden");
            $amount.removeClass("hidden");
            $stripe.addClass("hidden");
            $sebl.addClass("hidden");
            $("#modile").addClass("active");
            $internet.removeClass("active");
            $credit.removeClass("active");
            $manual.removeClass("active");
            $agent.removeClass("active");
            $international.removeClass("active");
            $("#bkash").removeClass("hidden");
            $("#nagad").removeClass("hidden");
            setTimeout(() => {
                 $('#currency_select').val('BDT').trigger('change');
            }, 1000);
        }

        $internet.on("click", function() {
            $('#stripe').removeClass("active_modile");
            $('#sebl').removeClass("active_modile");
            $openMobile.removeClass("hidden");
            $openInternet.addClass("hidden");
            $openCredit.addClass("hidden");
            $openManual.addClass("hidden");
            $stripe.addClass("hidden");
            $sebl.addClass("hidden");
            $openBangla.addClass("hidden");
            $("#bangla-qr").removeClass("active");
            $openAgent.addClass("hidden");
            $stripe_text.css("color", "#000000f2")
            $sebl_text.css("color", "#000000f2")
            $amount.removeClass("hidden");
            $(this).addClass("active");
            $modile.removeClass("active");
            $international.removeClass("active");
            $credit.removeClass("active");
            $manual.removeClass("active");
            $agent.removeClass("active");
            setTimeout(() => {
                 $('#currency_select').val('BDT').trigger('change');
            }, 1000);
        });

        $credit.on("click", function() {
            $('#stripe').removeClass("active_modile");
            $('#sebl').removeClass("active_modile");
            $openMobile.addClass("hidden");
            $openInternet.addClass("hidden");
            $openCredit.removeClass("hidden");
            $openBangla.addClass("hidden");
            $("#bangla-qr").removeClass("active");
            $stripe_text.css("color", "#000000f2")
            $sebl_text.css("color", "#000000f2")
            $openManual.addClass("hidden");
            $stripe.addClass("hidden");
            $sebl.addClass("hidden");
            $openAgent.addClass("hidden");
            $amount.addClass("hidden");
            $(this).addClass("active");
            $internet.removeClass("active");
            $modile.removeClass("active");
            $international.removeClass("active");
            $manual.removeClass("active");
            $agent.removeClass("active");
            setTimeout(() => {
                 $('#currency_select').val('BDT').trigger('change');
            }, 1000);
        });
        $manual.on("click", () => {
            triggerManual();
        })

        function triggerManual() {
            $('#stripe').removeClass("active_modile");
            $('#sebl').removeClass("active_modile");
            $openMobile.addClass("hidden");
            $openInternet.addClass("hidden");
            $openCredit.addClass("hidden");
            $stripe_text.css("color", "#000000f2")
            $sebl_text.css("color", "#000000f2")
            $stripe.addClass("hidden");
            $sebl.addClass("hidden");
            $openManual.removeClass("hidden");
            $international.removeClass("active");
            $openBangla.addClass("hidden");
            $("#bangla-qr").removeClass("active");
            $openAgent.addClass("hidden");
            $amount.removeClass("hidden");
            $("#manual").addClass("active");
            $internet.removeClass("active");
            $modile.removeClass("active");
            $credit.removeClass("active");
            $manual.addClass("active");
            $agent.removeClass("active");
            setTimeout(() => {
                 $('#currency_select').val('BDT').trigger('change');
            }, 1000);
        }

        $agent.on("click", () => {
            triggerAgent();
        })

        function triggerAgent() {
            $('#stripe').removeClass("active_modile");
            $openMobile.addClass("hidden");
            $stripe_text.css("color", "#000000f2")
            $sebl_text.css("color", "#000000f2")
            $openInternet.addClass("hidden");
            $openCredit.addClass("hidden");
            $stripe.addClass("hidden");
            $('#sebl').removeClass("active_modile");
            $sebl.addClass("hidden");
            $openBangla.addClass("hidden");
            $("#bangla-qr").removeClass("active");
            $international.removeClass("active");
            $openManual.addClass("hidden");
            $openAgent.removeClass("hidden text-white");
            $amount.removeClass("hidden");
            $("#agent").addClass("active");
            $internet.removeClass("active");
            $modile.removeClass("active");
            $credit.removeClass("active");
            $manual.removeClass("active");
            setTimeout(() => {
                 $('#currency_select').val('BDT').trigger('change');
            }, 1000);
        }
        $international.on("click", () => {
            triggerInternational();
        })

        function triggerInternational() {
            $manual.removeClass("active");
            $stripe_text.css("color", "#000000f2")
            $sebl_text.css("color", "#000000f2")
            $("#international").addClass('active');
            $openBangla.addClass("hidden");
            $("#bangla-qr").removeClass("active");
            $openInternational.removeClass("hidden");
            $stripe.removeClass('hidden');
            $stripe.removeClass('active_modile');
            $sebl.removeClass('hidden');
            $sebl.removeClass('active_modile');
            $("#open-manual").addClass("hidden");
            $("#open-agent").addClass("hidden");
            $("#open-internet").addClass("hidden");
            $("#open-credit").addClass("hidden");
            $("#bkash").addClass("hidden");
            $("#nagad").addClass("hidden");
            $internet.removeClass("active");
            $modile.removeClass("active");
            $credit.removeClass("active");
            $agent.removeClass("active");
            
        };

        $bangla.on("click", () => {
            triggerQRCode();
        })

        function triggerQRCode() {
            setTimeout(() => {
                 $('#currency_select').val('BDT').trigger('change');
            }, 1000);
            $('#stripe').removeClass("active_modile");
            $stripe.addClass("hidden");
            $('#sebl').removeClass("active_modile");
            $sebl.addClass("hidden");
            $("#international").removeClass('active');
            $openInternational.addClass("hidden");
            $openMobile.addClass("hidden");
            $openInternet.addClass("hidden");
            $openCredit.addClass("hidden");
            $openAgent.addClass("hidden");
            $("#bangla-qr").addClass("active");
            $internet.removeClass("active");
            $modile.removeClass("active");
            $credit.removeClass("active");
            $manual.removeClass("active");
            $agent.removeClass("active");
            $openBangla.removeClass("hidden");
            $openManual.addClass("hidden");
            $amount.removeClass("hidden");
        }

        $bkash.on("click", function() {
            setActivePaymentMethod($bkash);
        });
        $("#stripe").on('click', function() {
            $sebl.removeClass('active_modile');
            $stripe_text.css("color", "white")
            $sebl_text.css("color", "black")
            setActivePaymentMethod($stripe);
            setTimeout(() => {
                 $('#currency_select').val('USD').trigger('change');
            }, 500);
        });
         $("#sebl").on('click', function() {
            $stripe.removeClass('active_modile');
            $sebl_text.css("color", "white")
            $stripe_text.css("color", "black")
            setActivePaymentMethod($sebl);
            setTimeout(() => {
                 $('#currency_select').val('BDT').trigger('change');
            }, 500);
        });
        $nagad.on("click", function() {
            setActivePaymentMethod($nagad);
        });

        $rocket.on("click", function() {
            setActivePaymentMethod($rocket);
        });

        $upay.on("click", function() {
            setActivePaymentMethod($upay);
        });

        const fieldsContainer = $("#fields");

        // Remove 'active' class from all items and hide the fields container
        $(".manual-item").not(this).removeClass("active");
        fieldsContainer.hide();
        fieldsContainer.empty(); // Clear fields

        // Handle manual payment method clicks
        $(".manual-item").on("click", function() {
            $.each(paymentMethods, function(_, item) {
                item.removeClass("active_modile");
            });

            const manualId = $(this).data("id");
            fetchFields(manualId); 
            $(".manual-item").removeClass("active_modile"); 
            $(this).addClass("active_modile"); 
        });

        const agentFieldsContainer = $("#agent-fields");
        // Handle agent payment method clicks
        $(".agent-item").on("click", function() {
            $.each(paymentMethods, function(_, item) {
                item.removeClass("active_modile text-white");
            });
            const agentName = $(this).data("name");
            agentFetchFields(agentName);
            $(".agent-item").removeClass("active_modile");
            $(this).addClass("active_modile text-white");
        });

        // Function to set active payment method
        function setActivePaymentMethod(method) {
            $.each(paymentMethods, function(_, item) {
                $(".manual-item").removeClass("active_modile");
                $(".manual-item").not(this).removeClass("active");
                item.removeClass("active_modile");
            });
            method.addClass("active_modile text-white");
        }

        function getFieldValues() {
            const data = {};
            let isValid = true;
            let errorMessage = "";
            $('input[name^="info_keys"]').each(function() {
                const key = $(this).attr("placeholder");
                const value = $(this).val();
                if (!value.trim()) {
                    isValid = false;
                    errorMessage = `The field "${key}" cannot be empty.`;
                    toastr.error(errorMessage);
                    return false;
                }
                data[key] = value;
            });

            if (!isValid) {
                return false;
            }
            return data;
        }
    </script>
    <script>
        var paylink = '{{ $data->hash }}';

        var ref = '{{ $data->link . time() }}';

        $('#payment').on('click', function() {
            const currencySelectElement = document.getElementById('currency_select');
            if (!currencySelectElement) {
                toastr.error("Currency select element is not available.");
                return;
            }

            const selectedCurrency = currencySelectElement.value;
            const amounts = $('#amount_input').val();

            if (!amounts) {
                toastr.error("Amount field cannot be empty.");
                return;
            }

            toggleSpinner(true);

            if ($('#bkash').hasClass("active_modile")) {
                paymentSite(amounts, 'bkash', "BDT");
            } else if ($('#nagad').hasClass("active_modile")) {
                paymentSite(amounts, 'nagad', "BDT");
            } else if ($('#stripe').hasClass("active_modile")) {
                paymentSite(amounts, 'stripe', "USD");
            }
            else if ($('#sebl').hasClass("active_modile")) {
                paymentSite(amounts, 'sebl', "BDT");
            }
            else if ($('.manual-item.active_modile').length > 0) {
                // Correctly select the active manual item and get its ID
                const manualItem = $('.manual-item.active_modile');
                const manualId = manualItem.data('id');

                const fieldValues = getFieldValues();

                if (!fieldValues) {
                    toggleSpinner(false);
                    return;
                }
                paymentSite(amounts, 'manual', "BDT", manualId, fieldValues);
            } else if ($('.agent-item.active_modile').length > 0) {
                const agentItem = $('.agent-item.active_modile');
                const senderNumber = document.getElementsByClassName('sender_number')[0].value;
                const transactionId = document.getElementsByClassName('transaction_id')[0].value;
                const agentNumber = document.getElementsByClassName('agent-number')[0].textContent;
                const agentName = agentItem.data('name');
                let errorMessage = '';
                // Check for each field and build the error message dynamically
                if (!senderNumber) {
                    errorMessage += "Sender Number, ";
                }
                if (!transactionId) {
                    errorMessage += "Transaction ID, ";
                }

                // Remove the last comma and space if any
                errorMessage = errorMessage.trim().slice(0, -1);

                if (errorMessage) {
                    toastr.error(`The ${errorMessage} fields cannot be empty`);
                    toggleSpinner(false);
                    return;
                }
                paymentSite(amounts, 'p2p', "BDT", '', '', senderNumber, transactionId, agentName, agentNumber);
            } else {
                toastr.error("Please select an available payment method.");
                toggleSpinner(false);
                return;
            }
        });

        function paymentSite(amount, payment_method, currency, manualId = null, fieldValues = null, senderNumber = null,
            transactionId = null, agentName = null, agentNumber = null) {
            if (paylink == '') {
                alert('Paylink is not set');
                toggleSpinner(false);
                return;
            }
            const key_id = @json($data)?.key_id;
            const walletElement = document.getElementsByClassName('wallet')[0];
            const wallet = walletElement ? walletElement.textContent.trim() : '';
            data = {
                payment_type: "{{ $paymentSetting->payment_type ?? 'self' }}",
                currency: currency,
                amount: amount,
                payment_method: payment_method,
                reference: ref,
                manualId: manualId,
                fieldValues: fieldValues,
                callback_url: "{{ route('payment.callback') }}",
                hidden_field: wallet || agentNumber,
                networks: agentName?.toLowerCase() || '',
                transaction_id: transactionId,
                sender_number: senderNumber,
                key_id: key_id,
            }
            fetch("{{ url('/') }}/api/v1/create_payment_with_direct", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-HASH': paylink
                },
                body: JSON.stringify(data)
            }).then(res => {
                let rs = res;
                if (rs.status == 200 || rs.status == 201) {
                    res.json().then(response => {
                        console.log('response: ', response)
                        if (response.data) {
                            if (response.data.url) {
                                window.location.href = response.data.url;
                            } else {
                                window.location.href = response.data;
                            }
                        } else {
                            if (response.url) {
                                window.location.href = response.url;
                            } else if (response.message) {
                                // toastr.error(response.message);
                                Swal.fire({
                                    title: 'Failed!',
                                    text: response.message,
                                    icon: 'warning',
                                });
                            } else {
                                // toastr.error("Something went wrong");
                                Swal.fire({
                                    title: 'Failed!',
                                    text: "Something went wrong",
                                    icon: 'warning',
                                });
                            }
                        }
                    });
                } else {
                    res.json().then(response => {
                        if (response.message || response?.error) {
                            // toastr.error(response.message);
                            Swal.fire({
                                title: 'Failed!',
                                text: response.message || response?.error,
                                icon: 'warning',
                            });
                        } else {
                            // toastr.error("Payment already been processed.");
                            Swal.fire({
                                title: 'Failed!',
                                text: "Payment already been processed.",
                                icon: 'warning',
                            });
                        }
                    });
                }
            }).finally(() => {
                toggleSpinner(false);
            });
        }

        function toggleSpinner(isLoading) {
            if (isLoading) {
                $('#payment').hide();
                $('#loadingSpinner').show();
            } else {
                $('#payment').show();
                $('#loadingSpinner').hide();
            }
        }


        $(document).ready(function() {
            // Add currency options
            const currencies = ['BDT', 'USD'];
            const currencySelect = document.getElementById('currency_select');
            // console.log('currencySelect', currencySelect?.value);
            // $('#currency_select').val('USD').trigger('change');
            // amount should be change.
            currencies.forEach(currency => {
                if(currencySelect?.value == currency){
                    return;
                }
                const option = document.createElement('option');
                option.value = currency;
                option.text = currency;
                currencySelect.appendChild(option);
            });
            // Handle manual item click
            $(".manual-item").on("click", function() {
                const manualId = $(this).data("id");
                const defaultCurrency = $(this).data("default_currency");

                // Set the dropdown to default currency
                document.getElementById('currency_select').value = defaultCurrency;

                // Update exchange rate based on selected manual item's default currency
                const currentAmount = parseFloat('{{ $data->amount }}');
                const baseCurrency = '{{ $data->currency }}';
                fetchExchangeRatesAndUpdate(currentAmount, baseCurrency, defaultCurrency);

                // Add active class and fetch manual fields
                $(".manual-item").removeClass("active_modile");
                $(this).addClass("active_modile");

                fetchFields(manualId);
            });

            // Fetch exchange rates and update the UI
            function fetchExchangeRatesAndUpdate(amount, baseCurrency, targetCurrency) {
                fetch("{{ url('/') }}/api/public/currency/rate")
                    .then(response => response.json())
                    .then(data => {
                        const rates = data.usd;

                        // Convert amount to target currency
                        let amountInUSD = baseCurrency.toLowerCase() === 'usd' ?
                            amount :
                            amount / rates[baseCurrency.toLowerCase()];
                        let convertedAmount = amountInUSD * rates[targetCurrency.toLowerCase()];

                        // Round converted amount
                        convertedAmount = Math.round(convertedAmount * 100) / 100;

                        // Update UI
                        $('#amount_input').val(convertedAmount);
                        $('#displayed_currency').text(targetCurrency);

                        // Update exchange rate display
                        $('#rate').text(
                            `1 ${baseCurrency} = ${(rates[targetCurrency.toLowerCase()] / rates[baseCurrency.toLowerCase()]).toFixed(4)} ${targetCurrency}`
                        );
                        $('#converted_amount').text(`${convertedAmount} ${targetCurrency}`);
                        $('#exchange_rate').show();
                    })
                    .catch(error => {
                        console.error("Error fetching exchange rates:", error);
                        toastr.error("Failed to update exchange rates. Please try again.");
                    });
            }

            // Handle dropdown change
            /*$('#currency_select').on('change', function() {
                const selectedCurrency = $(this).val();
                const baseCurrency = '{{ $data->currency }}';
                const baseAmount = parseFloat('{{ $data->amount }}');
                fetchExchangeRatesAndUpdate(baseAmount, baseCurrency, selectedCurrency);
            });*/
            $(document).on('change', '#currency_select', function() {
                const selectedCurrency = $(this).val();
                const baseCurrency = '{{ $data->currency }}';
                const baseAmount = parseFloat('{{ $data->amount }}');
                fetchExchangeRatesAndUpdate(baseAmount, baseCurrency, selectedCurrency);
            });
        });
        @endif
    </script>

</body>

</html>