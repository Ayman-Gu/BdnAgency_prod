<h2>Nouvelle demande de devis</h2>

<p><strong>Nom :</strong> {{ $name }}</p>
<p><strong>Email :</strong> {{ $email }}</p>
<p><strong>Services souhaités :</strong></p>
<ul>
  @foreach ($services as $service)
    <li>{{ $service }}</li>
  @endforeach
</ul>
<p><strong>Message :</strong></p>
<p>{{ $user_message }}</p>
