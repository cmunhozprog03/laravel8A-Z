<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Edit Brand <b></b>
          

      </h2>
  </x-slot>

  <div class="py-4">
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
           
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header" action="">Edit Brand</div>
            <div class="card-body">
              <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                <div class="form-group">
                  <label for="">Brand Name</label>
                  <input type="text" name="brand_name" class="form-control" 
                    value="{{ $brands->brand_name }}" maxlength="255">
                  @error('brand_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Brand Image</label>
                  <input type="file" name="brand_image" class="form-control" 
                    value="{{ $brands->brand_image }}"  maxlength="255">
                  @error('brand_image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <img src="{{ asset($brands->brand_image) }}" alt="" style="width: 300px;">
                </div>
                <button type="submit" class="btn btn-primary">Update Brand</button>
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

   


  </div>
</x-app-layout>
