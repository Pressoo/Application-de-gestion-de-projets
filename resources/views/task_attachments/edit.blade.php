@extends ('layouts.app')

@section ('content')
<h1>Modifier le fichier attaché - {{  $ taskAttachment -> file_name}}</h1>


<form action="{{ route (' task_attachments.update',  $ taskAttachment -> id )}}" method ="POST">
@csrf
@method ('PUT')

<div class ='form-group'>
<label for = "file_name">Nom du fichier:</label >
<input type = "text " name = "file_name " value = "{{  $ taskAttachment -> file_name}}" required />
<p>(Vous pouvez changer le nom du fichier)</p >
</div >

<button type = "submit "> Mettre à jour le fichier attaché </button >
</form >

<a href ="{{ route (' task_attachments.index')}}">Retourner à la liste des fichiers attachés.</a >
@endsection



