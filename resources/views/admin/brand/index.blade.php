<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Brand <b></b>
          

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
            <div class="class-header">All Brand</div>
              <div class="table-responsive">
                <table class="table mt-4">
                  <thead>
                    <tr class="bg-green-800 text-gray-50">
                      <th scope="col">ID</th>
                      <th scope="col">Brand Name</th>
                      <th scope="col">Brand Image</th>
                      <th scope="col">Create At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($brands as $brand)
                      <tr>
                        <th scope="row">{{ $brand->id }}</th>
                        <td>{{ $brand->brand_name }}</td>
                        <td><img src="{{ asset($brand->brand_image) }}" alt="{{ $brand->brand_name }}"
                          style="width:70px; height:40px"></td>
                        <td>
                          @if ($brand->created_at == NULL)
                            <span class="text-danger">N/A</span>
                          @else 
                            {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}</td>
                          @endif
                        </td>
                        <td>
                          <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-danger"
                            onclick="return confirm('Tem certeza que deseja excluir?')">Delete</a>
                        </td>
                      </tr>  
                    @endforeach
                    
                  </tbody>
                </table>
                {{ $brands->links() }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Add Brand</div>
            <div class="card-body">
              <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Brand Name</label>
                  <input type="text" name="brand_name" class="form-control" maxlength="255">
                  @error('brand_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Brand Image</label>
                  <input type="file" name="brand_image" class="form-control" maxlength="255">
                  @error('brand_image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Brand</button>
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

   


  </div>
</x-app-layout>
