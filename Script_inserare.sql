--inserare date in tabela vehicul
insert into vehicul values(null ,'bicicleta', 23,8);
insert into vehicul values(null,'tricicleta',4,10);
insert into vehicul values(null,'bicicleta',14,8);
insert into vehicul values(null,'trotineta',10,9);
insert into vehicul values(null,'bicicleta',60,8);
insert into vehicul values(null,'trotineta',9,9);

select* from vehicul;

--inserare date in tabela detalii_vehicul
insert into detalii_vehicul values('Xiaomi', 2000,'alb','Nu',1,10);
insert into detalii_vehicul values('Myria', 2010,'rosie','Nu',5,10);
insert into detalii_vehicul values('Mercury', 2009,'negru','Nu',3,10);
insert into detalii_vehicul values('Xiaomi', 2007,'albastra','Nu',2,12);
insert into detalii_vehicul values('Vortex', 2005,'negru','Nu',4,9);
insert into detalii_vehicul values('Xiaomi', 2008,'argintie','Nu',6,9);

select *from detalii_vehicul;

--inserare date in tabela client
insert into client values(null,'Andrici','Ioana','andriciioana@yahoo.com','0787114990',to_date('10.03.2000','DD.MM.YYYY'));
insert into client values(null,'Mihai','Cosmin','cosminmihai@yahoo.com','0787897990',to_date('15.05.1989','DD.MM.YYYY'));
insert into client values(null,'Faraoanu','Roxana','roxana@gmail.com','0733514990',to_date('19.12.2004','DD.MM.YYYY'));
insert into client values(null,'Hobinca','Larisa','larisa05hobinca@yahoo.com','0733756990',to_date('01.05.1990','DD.MM.YYYY'));
insert into client values(null,'Dobre','Cosmin','dobrecosmin@gmail.com','0787854690',to_date('14.03.1978','DD.MM.YYYY'));
insert into client values(null,'Costel','Andrei','andreicostel05@yahoo.com','0733264587',to_date('10.03.1999','DD.MM.YYYY'));


select * from client;

--inserare date in tabela contract
insert into contract values (null,2,to_date('12.12.2021','DD.MM.YYYY'),to_date('13.12.2021','DD.MM.YYYY'),
((select (to_date('13.12.2021','DD.MM.YYYY')-to_date('12.12.2021','DD.MM.YYYY'))*24 from dual)*(select tarif from detalii_vehicul where id_vehicul='2')
+(select sum(nvl(vehicul.penalizare,0))from vehicul where vehicul.id_vehicul='2' )),1,'Da');

insert into contract values (null,3,to_date('19.12.2021','DD.MM.YYYY'),to_date('22.12.2021 2.50','DD.MM.YYYY '),
((select (to_date('22.12.2021','DD.MM.YYYY')-to_date('19.12.2021','DD.MM.YYYY'))*24 from dual)*(select tarif from detalii_vehicul where id_vehicul='3')
+(select sum(nvl(vehicul.penalizare,0))from vehicul where vehicul.id_vehicul='3' )),4,'Da');

insert into contract values (null,4,to_date('19.12.2021','DD.MM.YYYY'),to_date('20.12.2021','DD.MM.YYYY'),
((select (to_date('20.12.2021','DD.MM.YYYY')-to_date('19.12.2021','DD.MM.YYYY'))*24 from dual)*(select tarif from detalii_vehicul where id_vehicul='4')
+(select sum(nvl(vehicul.penalizare,0))from vehicul where vehicul.id_vehicul='4' )),3,'Da');

insert into contract values (null,1,to_date('24.12.2021 ','DD.MM.YYYY '),to_date('25.12.2021','DD.MM.YYYY'),
((select (to_date('25.12.2021','DD.MM.YYYY')-to_date('24.12.2021','DD.MM.YYYY'))*24 from dual)*(select tarif from detalii_vehicul where id_vehicul='1')
+(select sum(nvl(vehicul.penalizare,0))from vehicul where vehicul.id_vehicul='1' )),2,'Da');

insert into contract values (null,5,to_date('14.05.2021','DD.MM.YYYY'),to_date('15.05.2021','DD.MM.YYYY'),
((select (to_date('15.05.2021','DD.MM.YYYY')-to_date('14.05.2021','DD.MM.YYYY'))*24 from dual)*(select tarif from detalii_vehicul where id_vehicul='5')
+(select sum(nvl(vehicul.penalizare,0))from vehicul where vehicul.id_vehicul='5' )),5,'Da');

insert into contract values (null,5,to_date('20.05.2021','DD.MM.YYYY'),to_date('21.05.2021 ','DD.MM.YYYY'),
((select (to_date('21.05.2021','DD.MM.YYYY')-to_date('20.05.2021','DD.MM.YYYY'))*24 from dual)*(select tarif from detalii_vehicul where id_vehicul='5')
+(select sum(nvl(vehicul.penalizare,0))from vehicul where vehicul.id_vehicul='5' )),5,'Da');



select * from contract;

--inserare date in tabela mecanic
insert into mecanic values(null,'Andici','Mihai','andricimihai98@yahoo.com','0732843256');
insert into mecanic values(null,'Mihoc','Sergiu','mihocsergiu@gmail.com','0756435678');
insert into mecanic values(null,'Hilu','Georgian','hihigeo@gmail.com','0789674563');
insert into mecanic values(null,'Chirinciuc','Florin','florinchi@gmail.com','0789567837');
insert into mecanic values(null,'Coroc','Narcis','narciscoroc@yahoo.com','0789045897');
insert into mecanic values(null,'Costea','Napoleon','napolc@yahoo.com','0777045897');

select* from mecanic;

--inserare date in tabela problema
insert into problema values(null,'probleme cu coarnele de la tricicleta', 'Iasi',1,1);
insert into problema values(null,'probleme cu pedala de la bicicleta ', 'Iasi',4,2);
insert into problema values(null,'probleme cu rotile de la trotineta', 'Valea Lupului',3,3);
insert into problema values(null,'probleme cu frana de la bicicleta', 'Iasi',1,4);
insert into problema values(null,'probleme cu pedala si coarnele de la bicicleta', 'Miroslava',5,6);
insert into problema values(null,'probleme cu tricicleta', 'Valea Lupului',2,1);
select * from problema;

