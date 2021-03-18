  <form action="{{route('input')  }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Role</label>
        <input type="text" name="role" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Telpon</label>
        <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Foto</label>
        <input type="file" name="foto" class="form-control" id="exampleInputPassword1">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>