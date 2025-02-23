@extends('layouts.app')

@section('content')
<h1>Ajouter un nouveau fichier attaché à une tâche</h1>

<form action="{{ route('task_attachments.store') }}" method="POST" enctype='multipart/form-data'>
@csrf

<div class='form-group'>
<label for='file'>Choisir le fichier :</label><input type='file' name='file[]' multiple required />
<p>(Vous pouvez sélectionner plusieurs fichiers)</p></div>

<div class='form-group'>
<label for='task_id'>Tâche associée :</label><select name='task_id' id='task_id' required>@foreach($tasks as $task)<option value='{{ $task->id }}'>{{ $task->title }}</option>@endforeach</select></div>

<button type='submit'>Ajouter le fichier(s)</button></form>@endsection 

