Izvršena je migracija pristupa podacima sa xml na bazu.
Jedino sam ostavio da se prilikom log-ina ukoliko baza ne postoji provjere log in podaci iz xml fajla.
Razlog jeste da, za slucaj da asistent ili profesorica iz nekog razloga ne mogu pokrenuti moju bazu na racunaru,
ipak budu u mogucnosti pristupiti admin panelu i koristiti stranicu. Takodjer sam iz istog razloga ostavio u admin panelu
i dugmad kreiraj odnosno izbrisi bazu, za koja sam predvidio da se koriste samo ako dump baze iz nekog razloga ne radi.
Inace je sav pristup i obrada podacima prebacena na bazu podataka koja ima 3 tabele : korisnici, artikli i narudzbe.
Da bi se izvrsila narudzba, korisnik mora biti logovan na stranicu. Dakle gostima nije dozvoljeno koristenje korpe.
Po unosu artikala iz kataloga u korpu, u korpa.php fajlu se prikazuje korisnica korpa i artikli u njoj.
U slucaju da korisnik zeli smanjiti kolicinu nekog artikla u korpi postoji i definisano dugme za to.
Nakon sto se klikne na "zavrsi kupovinu" dugme, kreira se unos u tabeli narudzbe sa foreign key od korisnika kao i artikala
koje je korisnik izabrao. 
Pretraga narudzbi se vrsi u admin panelu i to pomocu id broja ili od artikala ili od korisnika.
Za unesen id od korisnika ispisivaju se sve narudzbe tog korisnika, za unesen id od artikla sve narudzbe u kojima je
porucen taj artikal.

Rest servis je odradjen slicno kao servis koji smo imali na rma kod spotify. Kao query se salje string,
te se u bazi podataka traze artikli ciji naziv odgovara unesenom stringu. Pri tome je moguce da se string samo djelimicno
slaze sa nazivom artikla i on ce biti prikazan. Tako na primjer ako se unese kao query "aziv" kao rezultat ce se vratiti
artikal koji se zove "naziv1" odnosno "naziv2" i slicno. Za ovaj servis je odgovoran servisStranica.php fajl.