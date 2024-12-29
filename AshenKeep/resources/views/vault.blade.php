<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <style>
            .bg-custom-gold {
                background-color: #C28E21;
            }
            .sidebar-custom {
                background-color: #C28E21;
                height: 500px;
                width: 300px;
                border-top-right-radius: 5.5rem;
                border-bottom-right-radius: 5.5rem;
                position: fixed;
                left: 0;
                top: 0;
            }
            .navbar-custom {
                background-color: white;
                width: 100%;
                height: 80px;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .content-area {
                margin-left: 100px;
                padding-top: 50px;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="font-sans antialiased bg-white text-gray-800">
        <div class="min-h-screen">
            <!-- Navbar -->
            
            <header class="m-8">
                <nav class="rounded-lg p-5">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="/" class="block">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl text-black font-semibold font-raleway text-left">AshenKeep</h1>
                </a>
                <!-- Navigation Links -->
                <nav class="hidden sm:flex space-x-8 lg:space-x-20">
                    <a href="/dashboard" class="text-black-700 hover:text-gray-900 font-semibold font-raleway text-base sm:text-lg lg:text-xl">Dashboard</a>
                    <a href="/faqs" class="text-black-700 hover:text-gray-900 font-semibold font-raleway text-base sm:text-lg lg:text-xl">FAQs</a>
                    <a href="/about" class="text-black-700 hover:text-gray-900 font-semibold font-raleway text-base sm:text-lg lg:text-xl">About Us</a>
                </nav>
                        </div>
                    </div>
                </nav>
            </header>


            <!-- Side Bar -->
            <div class="flex">
                <div class="relative w-50 p-6 shadow-2xl" style="background-color: #C28E21; height: 500px; border-top-right-radius: 6rem; border-bottom-right-radius: 6rem;">
                    <div class="flex flex-col items-center space-y-11">
                    <a href="#" class="block text-black hover:text-gray-200 font-medium mt-8">
                        <div class="flex flex-col items-center">
                            <img src="img/vault_icon.svg" class="h-20 w-20 mb-2 transition duration-300 transform hover:scale-110">
                            <span>Vaults</span>
                        </div>
                    </a>
                    <a href="#" class="block text-black hover:text-gray-200 font-medium">
                        <div class="flex flex-col items-center">
                            <img src="img/apply_icon.svg" class="h-16 w-16 mb-2 transition duration-300 transform hover:scale-110">
                            <span>Apply for Vault</span>
                        </div>
                    </a>
                    <a href="/dashboard" class="block text-black hover:text-gray-200 font-medium">
                        <div class="flex flex-col items-center">
                            <img src="img/logout_icon.svg" class="h-16 w-16 mb-2 transition duration-300 transform hover:scale-110">
                            <span>Logout</span>
                        </div>
                    </a>
                        </div>
                </div>
                <div class="content-area flex-1 p-6">
                    <h1 class="text-4xl font-bold">Hi, John!</h1>
                </div>
            </div>
        </div>
    </body>
</html>