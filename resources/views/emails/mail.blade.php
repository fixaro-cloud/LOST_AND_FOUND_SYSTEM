
    {{-- <h1>hello {{ $user->name }}</h1>
    <a target="_blank" href="{{ asset('/reset-password') }}">
        <h3>password reset link here</h3>
    </a>
 --}}
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Password Reset</title>
     <script src="https://cdn.tailwindcss.com"></script>
 </head>
 <body class="bg-gray-100 flex items-center justify-center h-screen">
 
 <div class="bg-white p-8 rounded-lg shadow-md w-96">
     <h1 class="text-2xl font-bold mb-4 text-center">Hello {{ $user->name }}</h1>
 
     <div class="mb-6">
         <p class="text-gray-700 text-lg">You are receiving this email because we received a password reset request for your account.</p>
         <p class="text-gray-700 mt-2 text-lg">If you did not request a password reset, no further action is required.</p>
     </div>
 
     <a href="{{ asset('/reset-password') }}" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-center block">
         Reset Your Password
     </a>
 
     <p class="mt-4 text-gray-600 text-sm text-center">
         This link will expire in 60 minutes.
     </p>
 </div>
 
 </body>
 </html>