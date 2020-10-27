# PHP-CMS
Projekt iz predmeta "Programiranje u PHP"

## CMS
CMS jest administracijsko sučelje za internet trgovinu gdje administrator može upravljati novim i starim proizvodima.

## O aplikaciji

Postoje stranice:
* prijava,
* kontrolna ploča,
* proizvodi,
  *uredi proizvod,
* admini,
* 404 stranica i
* prazna stranica.

### Prijava

Za početak korištenja aplikacije, potrebno se prijaviti u sustav pomoću formi za prijavu.
Potrebno je unijeti ispravnu e-mail adresu i zaporku.

### Kontrolna ploča

Nakon prijave, proslijeđeni smo na stranicu 'Kontrolna ploča' koja je ujedno i početna stranica.
Na kontrolnoj ploči se nalazi statistički dio sa okvirnim brojkama o broju administratora na sustavu te količini vrsta proizvoda.
Na dnu kontrolne ploče se nalazi gumb za kreiranje pdf datoteke sa okvirnim podacima.
S lijeve strane se nalazi izbornik preko kojeg se mogu vidjeti podaci o adminima i proizvodima.
Isti su podaci promjenjivi, tj. mogu se uređivati i brisati.

### Proizvodi

Na stranici 'Proizvodi' možemo kreirati novi proizvod, vidjeti tablicu trenutnih proizvoda s podatcima te gumbi za uređivanje ili brisanje proizvoda.
Pritiskom gumba za izradu novog proizvoda, otvara se pop-up prozor gdje je potrebno upisati šifru, naziv, cijenu te odrediti vrstu novog prozvoda.
Pritskom gumba "Izbriši", briše se proizvod iz baze.
Pritiskom gumba "Uredi", otvara se stranica 'Uredi proizvod'.

#### Uredi proizvod

Na stranici 'Uredi proizvod' vidi se forma za unos i izmjenu podataka odabranog proizvoda.

### Admini

Na stranici 'Admini' možemo dodati novog admina, vidjeti tablicu trenutnih korisnika s admin pristupom te gumbi za uređivanje ili brisanje admina.
Pritiskom gumba za kreiranje novog admina, otvara se pop-up prozor gdje je potrebno upisati korisničko ime, e-mail te zaporke.
Pritskom gumba "Izbriši", briše se admin iz baze.
Pritiskom gumba "Uredi", otvara se stranica 'Uredi proizvod'.

#### Uredi admina

Na stranici 'Uredi admina' vidi se forma za unos i izmjenu podataka odabranog admina.
