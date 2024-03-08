<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Welcome to Product Management System
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{route('products.show')}}" class="btn btn-primary bg-primary">View Page</a>
                        <a href="{{route('products.create')}}" class="btn btn-primary bg-success">Create Page</a>
                        <a href="{{route('products.delete')}}"  class="btn btn-primary bg-danger">delete page</a>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>



</body>
</html>
