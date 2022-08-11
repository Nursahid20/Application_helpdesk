@component('mail::message')
<br><br>
Terimakasih telah membuat permintaan kepada kami.. <br>
Silahkan buat permintaan lagi jika ada permintaan / permasalahan hardware maupun software <br>

@component('mail::button', ['url' => 'http://helpdesk.test/user/dashboard'])
Click here
@endcomponent
<br>
<div style="float: right; text-align:center">

    Divisi IT
    {{ $name }}


</div>
@endcomponent