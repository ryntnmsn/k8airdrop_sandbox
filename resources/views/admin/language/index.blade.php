@include('admin.partials.header')
@include('admin.partials.nav')


<div class="row">
  <div class="col"><h3>Airdrop Promos</h3></div>
  <div class="col text-end">
    <a href="{{ route('admin.languages.create')}}" class="btn text-white bg-primary fw-bold test">
      Add new
    </a>
  </div>
</div>

<div class="row mb-5">
  <div class="col">
    <table class="table mt-3 mb-5 align-middle">
      <thead class="fw-bold">
      <tr>
        <td>No.</td>
        <td>Code</td>
        <td>Name</td>
        <td>Action</td>
      </tr>
      </thead>
      <tbody>
        @foreach($languages as $language)
          <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$language->code}}</td>
            <td>{{$language->name}}</td>
            <td>
              <span>
                  <a href="{{route('admin.languages.edit',$language->id)}}" class="btn bg-transparent">
                      <i class="text-dark-2 fa-solid fa-pen-to-square"></i>
                  </a>
              </span>
{{--              <span>--}}
{{--                <a href="{{route('admin.languages.show',$language)}}" class="btn bg-transparent">--}}
{{--                    <i class="text-dark-2 fa-solid fa-eye"></i>--}}
{{--                </a>--}}
{{--              </span>--}}
              <span>
                  <form method="POST" action="{{route('admin.languages.destroy',$language->id)}}" class="d-inline">
                    @method('DELETE')
                    @csrf
                  <button class="btn bg-transparent" type="submit">
                      <i class="text-dark-2 fa-solid fa-trash-can"></i>
                  </button>
{{--                  <div class="form-group">--}}
{{--                      <input type="submit" class="btn btn-danger delete-user" value="Delete user">--}}
{{--                  </div>--}}
              </form>
              </span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@include('admin.partials.footer')


{{--<script>--}}
{{--  $(function() {--}}
{{--    if (localStorage.getItem('status')) {--}}
{{--      $("#status option").eq(localStorage.getItem('status')).prop('selected', true);--}}
{{--    }--}}
{{--    $("#status").on('change', function() {--}}
{{--      localStorage.setItem('status', $('option:selected', this).index());--}}
{{--    });--}}
{{--  });--}}
{{--</script>--}}

{{--<script>--}}
{{--  $(function() {--}}
{{--    if (localStorage.getItem('platform')) {--}}
{{--      $("#platform option").eq(localStorage.getItem('platform')).prop('selected', true);--}}
{{--    }--}}
{{--    $("#platform").on('change', function() {--}}
{{--      localStorage.setItem('platform', $('option:selected', this).index());--}}
{{--    });--}}
{{--  });--}}
{{--</script>--}}

{{--<script>--}}
{{--  $("#reset_button").click(function() {--}}
{{--    $('select').prop('selectedIndex', 0);--}}
{{--  });--}}
{{--</script>--}}

{{--<style lang="scss" scoped>--}}
{{--  .test{--}}
{{--    background-color: black;--}}
{{--  }--}}
{{--</style>--}}
