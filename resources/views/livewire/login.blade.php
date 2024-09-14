<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
            <style>
                body {
                    background: linear-gradient(to right, #00c6ff, #0072ff);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                }

                .login-button {
                    background: linear-gradient(135deg, #3b82f6, #60a5fa);
                    border: none;
                    color: #ffffff;
                    font-size: 1.125rem;
                    font-weight: 600;
                    padding: 0.75rem 2rem; 
                    border-radius: 9999px;
                    cursor: pointer;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                    transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
                    width: 100%; 
                    text-align: center; 
                }
            </style>
    </head>
    <body>
        <div class="my-10 flex justify-center w-full">
            <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
                <h1 class="text-center text-3xl my-5">Login</h1>

                <hr>
                <form class="my-4" wire:submit="submit">

                    <div class="flex justify-around my-8">
                        <div class="flex flex-wrap w-10/12">
                            <input type="email" class="p-2 rounded border shadow-sm w-full" placeholder="Email" wire:model="email" required/>
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex justify-around my-8">
                        <div class="flex flex-wrap w-10/12">
                            <input type="password" class="p-2 rounded border shadow-sm w-full" placeholder="Password" wire:model="password" required/>
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex justify-around my-8">
                        <div class="flex flex-wrap w-10/12">
                            <button type="submit" value="Login" class="login-button"> Login </button>
                        </div>
                    </div>
                </form>

                @if (session()->has('status'))
                    <div id="flash-message" class="fixed bottom-4 right-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded-md">
                        {{ session('status') }}
                    </div>
                @endif
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var flashMessage = document.getElementById('flash-status');
                        if (flashMessage) {
                            setTimeout(function () {
                                flashMessage.style.opacity = '0';
                                setTimeout(function () {
                                    flashMessage.style.display = 'none';
                                }, 300);
                            }, 3000); 
                        }
                    });
                </script>
            </section>
        </div>
    </body>
</html>