@include('admin.partials.header')
@include('admin.partials.nav')


<div class="row">
  <div class="col"><h3>Airdrop Subscription</h3></div>
  <div class="col text-end">
  </div>
</div>

<div>
  <span><a href="/subscriptions" class="bg-primary text-white px-2 py-1 rounded">View All</a></span>
  <span><a href="{{ route('subscriptions.japan') }}" class="bg-primary text-white px-2 py-1 rounded">Show Japan</a></span>
</div>


<div class="row mb-5">
  <div class="col">
    <table class="table mt-3 mb-5 align-middle">
      <thead class="fw-bold">
      <tr>
        <td>No.</td>
        <td>E-mail</td>
        <td>Date Register</td>
        <td>Status</td>
        <td>Action</td>
      </tr>
      </thead>
      <tbody>
      @foreach($subscribers as $subscriber)
        <tr>
          <td scope="row">{{$loop->iteration}}</td>
          <td>{{$subscriber->email}}</td>
          <td>{{$subscriber->created_at}}</td>
          <td>{{$subscriber->status}}</td>
          <td>
{{--              <span>--}}
{{--                  <a href="{{route('admin.languages.edit',$subscriber->id)}}" class="btn bg-transparent">--}}
{{--                      <i class="text-dark-2 fa-solid fa-pen-to-square"></i>--}}
{{--                  </a>--}}
{{--              </span>--}}
            <span>
                  <form method="POST" action="{{route('admin.languages.destroy',$subscriber->id)}}" class="d-inline">
                    @method('DELETE')
                    @csrf
                  <button class="btn bg-transparent" type="submit">
                      <i class="text-dark-2 fa-solid fa-trash-can"></i>
                  </button>
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

