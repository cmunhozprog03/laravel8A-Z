<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Olá <b>{{ Auth::user()->name }}!</b>
            <b style="float:right;">Total Users
                <span class="badge badge-danger">{{ count($users) }}</span>
            </b>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container shadow">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr class="bg-green-800 text-gray-50">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Create At</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                      
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
