@include('admin.partials.header')
@include('admin.partials.nav')

<form action="{{ route('admin.languages.store')}}" method="post" enctype="multipart/form-data" class="pb-5">
    @csrf
    <div class="row">
      <div class="col"><h3>Create Airdrop Promo</h3></div>
      <div class="col text-end">
        <button type="submit" class="btn text-white bg-primary fw-bold">
          Save promo
        </button>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="link" class="input-title">Name</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col">
        <div>
          <label for="link" class="input-title">Code</label>
          <input type="text" class="form-control" id="code" name="code">
        </div>
      </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).on('change','#platform',function(){
    if($(this).val()==="4" || $(this).val()==="5"){
      $("#interactive_container").show()
    } else {
      $("#interactive_container").hide()
    }
  });
</script>


<script>
  $(document).on('change','#is_interactive',function(){
    if($(this).val()==="yes"){
      $("#game_type_container").show()
    } else {
      $("#game_type_container").hide()
    }
  });
</script>


@include('admin.partials.footer')