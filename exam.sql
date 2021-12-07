drop database if exists filelec3;
create database filelec3;
use filelec3;



# -----------------------------------------------------------------------------
#       table : client
# -----------------------------------------------------------------------------

create table client(
   code_client int(3) not null auto_increment,
   nom_ville varchar(32) not null,
   nom varchar(32) not null,
   adresse varchar(32) not null,
   email varchar(50) not null,
   telephone varchar(32) not null,
   mdp varchar(32) not null,
   primary key (code_client)
);



# -----------------------------------------------------------------------------
#       table : commande
# -----------------------------------------------------------------------------

create table commande(
   ref_commande int(3) not null auto_increment,
   code_client int(3) not null,
   date_cmde date not null,
   etat varchar(10) null, 
   primary key(ref_commande),
   foreign key(code_client) references client(code_client)
);



# -----------------------------------------------------------------------------
#       table : facture
# -----------------------------------------------------------------------------

create table facture(
    numero_facture int(3) not null auto_increment,
    ref_commande int(3) not null,
    date_facture date not null,
    prix decimal(10,2) not null,
    primary key(numero_facture),
    foreign key(ref_commande) references commande(ref_commande)
);



# -----------------------------------------------------------------------------
#       table : technicien
# -----------------------------------------------------------------------------

create table technicien(
   numero_technicien int(3) not null auto_increment,
   nom varchar(20) not null,
   specialite varchar(32) not null,
   primary key (numero_technicien)
);



# -----------------------------------------------------------------------------
#       table : intervention
# -----------------------------------------------------------------------------

create table intervention(
   numero_intervention int(3) not null auto_increment,
   ref_commande int(3) not null,
   numero_facture int(3) not null,
   numero_technicien int(4) not null,
   date_debut date not null,
   date_fin date not null, 
   primary key(numero_intervention),
   foreign key(ref_commande) references commande(ref_commande),
   foreign key(numero_facture) references facture(numero_facture),
   foreign key(numero_technicien) references technicien(numero_technicien)
); 



# -----------------------------------------------------------------------------
#       table : unite
# -----------------------------------------------------------------------------

create table unite( 
   numero_unite int(3) not null auto_increment,
   nom varchar(32) not null,
   adresse varchar(25) not null,
   mail varchar(32) null, 
   primary key (numero_unite) 
);



# -----------------------------------------------------------------------------
#       table : produit
# -----------------------------------------------------------------------------

create table produit(
   ref_produit int(3) not null auto_increment,
   numero_unite int(4) not null,
   nom varchar(100) not null,
   prix decimal(10,2) not null,
   quantite int(4) not null,
   nb_vente int(4) null,
   img varchar(100),
   primary key(ref_produit),
   foreign key(numero_unite) references unite(numero_unite)
);



# -----------------------------------------------------------------------------
#       table : entreprise
# -----------------------------------------------------------------------------

create table entreprise(
   code_client int(3) not null auto_increment,
   nom_ville varchar(32) not null,
   numsiret varchar(32) not null,
   nom varchar(32) not null,
   adresse varchar(32) not null,
   email varchar(50) not null,
   telephone varchar(32) not null,
   mdp varchar(32) not null,
   primary key(code_client)
);



# -----------------------------------------------------------------------------
#       table : particulier
# -----------------------------------------------------------------------------

create table particulier(
   code_client int(3) not null auto_increment,
   nom_ville varchar(32) not null,
   prenom varchar(32) not null,
   nom varchar(32) not null,
   adresse varchar(32) not null,
   email varchar(50) not null,
   telephone varchar(32) not null,
   mdp varchar(32) not null,
   primary key (code_client)
);



# -----------------------------------------------------------------------------
#       table : appartenir
# -----------------------------------------------------------------------------

create table appartenir(
   ref_commande int(3) not null,
   ref_produit int(3) not null,
   quantite_commander int(3) not null,
   primary key(ref_commande, ref_produit),
   foreign key(ref_commande) references commande(ref_commande)
);



# -----------------------------------------------------------------------------
#       table : admins
# -----------------------------------------------------------------------------

create table admins(
  id_admin int(3) not null auto_increment,
  username varchar(32) not null,
  email varchar(50) not null,
  mdp varchar(32) not null,
  role enum ("admin", "user"),
  primary key (id_admin)
);



# -----------------------------------------------------------------------------
#       Fin de la BDD
# -----------------------------------------------------------------------------



# -----------------------------------------------------------------------------
#       Changement BDD
# -----------------------------------------------------------------------------

alter table client modify email varchar(50) unique;
alter table particulier modify email varchar(50) unique;
alter table entreprise modify email varchar(50) unique;



# -----------------------------------------------------------------------------
#       Triggers entreprise, particulier (heritage)
# -----------------------------------------------------------------------------

drop trigger if exists inserpart;
    delimiter //
    create trigger inserpart
    before insert on particulier 
    for each row 
    begin
    declare c,e int ; 
    declare code_c int;
    declare x int;
    select count(*) into c
    from client
    where code_client=new.code_client;
        if c=0
            then
                insert into client values(new.code_client, new.nom_ville, new.nom, new.adresse, new.email,
                 new.telephone, new.mdp);
        end if;
    select count(*) into e
    from entreprise
    where code_client=new.code_client;
        if e>0
            then signal sqlstate'45000'
            set message_text="c'est une entreprise";
        end if;
      select count(*) into code_c
      from particulier
      where code_client=new.code_client;
      set x = (select Max(code_c) from entreprise);
        if code_c > x
          then 
            insert into client values(new.code_client, new.nom_ville, new.nom, new.adresse, new.email,
                 new.telephone, new.mdp);
        else 
          set code_c = x+1 ;
      end if; 
    end //
    delimiter ;
    


  drop trigger if exists inserentre;
  delimiter //
  create trigger inserentre
  before insert on entreprise
    for each row 
    begin
    declare c,p int ;
    declare code_c int;
    declare x int;
      select count(*) into c 
      from client
      where code_client=new.code_client;
        if c =0
          then 
            insert into client values(new.code_client, new.nom_ville, new.nom, new.adresse, new.email,
                 new.telephone, new.mdp);
        end if ;
      select count(*) into p 
      from particulier
      where code_client=new.code_client;
        if p > 0
          then signal sqlstate'45000'
            set message_text='c''est un particulier' ;
        end if;
          select count(*) into code_c
      from entreprise
      where code_client=new.code_client;
      set x = (select Max(code_c) from particulier);
        if code_c > x 
          then 
            insert into client values(new.code_client, new.nom_ville, new.nom, new.adresse, new.email,
                 new.telephone, new.mdp); 
        else 
          set code_c = x+1;
        end if;
        end //
        delimiter ;  



    drop trigger if exists updpart;
    delimiter //
    create trigger updpart
    before update on particulier
    for each row
    begin 
    update client
     set 
     nom=new.nom,
     adresse=new.adresse,
     email=new.email,
     telephone=new.telephone,
     mdp=new.mdp
     where code_client=old.code_client;
    end //
    delimiter ;
    

    drop trigger if exists updentre;
    delimiter //
    create trigger updentre
    before update on entreprise
    for each row
    begin 
    update client
     set 
     nom=new.nom,
     adresse=new.adresse,
     email=new.email,
     telephone=new.telephone,
     mdp=new.mdp
     where code_client=old.code_client;
    end //
    delimiter ;

    
    drop trigger if exists delpart;
    delimiter //
    create trigger delpart
    before delete on particulier
    for each row
    begin 
    delete from client
       where code_client=old.code_client;
    end //
    delimiter ;  

    drop trigger if exists delentre;
    delimiter //
    create trigger delentre
    before delete on entreprise
    for each row
    begin 
    delete from client
       where code_client=old.code_client;
    end //
    delimiter ;




# -----------------------------------------------------------------------------
#      Vue
# -----------------------------------------------------------------------------

create view topSellProducts as(
    SELECT ref_produit, nom, prix, nb_vente, img, MAX(nb_vente)
    FROM produit 
    GROUP BY ref_produit
    ORDER BY nb_vente DESC
    LIMIT 0, 3
);


create view panier as(
  select cl.code_client, a.ref_commande, p.ref_produit, p.nom, a.quantite_commander, p.prix, p.img, c.date_cmde, p.prix * a.quantite_commander as prix_total
  from appartenir a, produit p, commande c, client cl
  where cl.code_client = c.code_client 
  and c.ref_commande = a.ref_commande 
  and a.ref_produit = p.ref_produit 
);

create view commandePayer as(
  select cl.code_client, a.ref_commande, p.ref_produit, p.nom, a.quantite_commander, p.prix, p.img, c.date_cmde, p.prix * a.quantite_commander as prix_total, c.etat
  from appartenir a, produit p, commande c, client cl
  where cl.code_client = c.code_client 
  and c.ref_commande = a.ref_commande 
  and a.ref_produit = p.ref_produit
  and c.etat = "payer"
);


# -----------------------------------------------------------------------------
#       Insertion de test
# -----------------------------------------------------------------------------

insert into unite VALUES(null, "unite 1", "Paris", "unite1@gmail.com");
insert into unite VALUES(null, "unite 2", "Lyon", "unite2@gmail.com");
insert into unite VALUES(null, "unite 3", "Marseille", "unite3@gmail.com");

INSERT INTO produit VALUES(null, 1, "Pneus", 75.50, 4, 5, "public/img/pneu.png"), 
(null, 1, "ESP", 200, 30, 50, "public/img/esp.jpg"), (null, 1, "GPS", 60, 40, 5, "public/img/gps.jpeg"),
(null, 2, "Regulateur de vitesse", 500, 7, 5, "public/img/regulateur-vitesse.jpeg"), (null, 2, "Aide au suivi de file", 60, 25, 5, "public/img/aide-suivi-fil.jpeg"),
(null, 1, "Freins", 150, 5, 5, "public/img/frein.jpeg"), (null, 1, "Filtres", 150, 55, 5, "public/img/gps.jpeg"), (null, 1, "Amortisseur", 275, 12, 5, "public/img/suspension.jpeg"), (null, 1, "GPS", 60, 40, 5, "public/img/embrayage.png");

insert into admins values(null, "admin", "a@gmail.com", "123", "admin");

insert into particulier values(null, "Val d'oises", "Alix", "Bourdin", "5 rue de la croix", "a@gmail.com", "0666257930", "123");

insert into commande values(null, 1, curdate(), "en cours"); 

insert into appartenir values(1, 1, 1);

insert into facture values(null, 1, curdate(), 75.50);

insert into technicien values(null, "Francois", "Mecano");
insert into technicien values(null, "Thierry", "carrossier");

insert into intervention values(null, 1, 1, 1, "2021/08/13", "2021/08/14");