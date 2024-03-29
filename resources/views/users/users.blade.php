{{-- Default way of wrinting php validatons/loops inside html tags --}}
<?php foreach($users_list  as $user) { ?>
  <h1>
    <?= $user['name'] ?>
  </h1>
  <h1>
    <?= $user['age'] ?>
  </h1>
  <hr>
<?php } ?>
<br><br>

{{-- We can write a clean code like this using blade, --}}
{{-- instead of writing php tag inside html like above --}}
@foreach ($users_list as $user)
    <h1> {{ $user['name'] }} </h1>
    <h1> {{ $user['age'] }} </h1>
    @if($user['age'] < 25)
      <p> <b> {{ $user['name'] }} </b> , you can't apply for this job </p>
    @endif
    <hr>
@endforeach

@copyright {{ date('Y') }} {{-- Can also use php functions inside blade --}}