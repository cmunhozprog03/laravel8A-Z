<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Category <b></b>
          

      </h2>
  </x-slot>

  <div class="py-12">
    <div class="container shadow">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session('success') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  
            @endif
            <div class="class-header">All Category</div>
              <div class="table-responsive">
                <table class="table mt-4">
                  <thead>
                    <tr class="bg-green-800 text-gray-50">
                      <th scope="col">ID</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">User</th>
                      <th scope="col">Create At</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                      <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                          @if ($category->created_at == NULL)
                            <span class="text-danger">N/A</span>
                          @else 
                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                          @endif
                        </td>
                      </tr>  
                    @endforeach
                    
                  </tbody>
                </table>
                {{ $categories->links() }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Add Category</div>
            <div class="card-body">
              <form action="{{ route('store.category') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="">Category Name</label>
                  <input type="text" name="category_name" class="form-control" maxlength="255">
                  @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
