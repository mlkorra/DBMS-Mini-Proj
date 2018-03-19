create table custInfo
(
	mail_id varchar(40) not null ,
	password varchar(30) not null ,
	name varchar(40) not null,
	phone_no bigint not null,
	default_addr varchar(40) ,
	login_count int ,
	primary key(mail_id)
);



create table distanceInfo
(
	location1 varchar(40),
	location2 varchar(40),
	distance decimal(5,2)	not null,

	primary key(location1,location2)
);


create table taxiBooking
(
	booking_id int unsigned not null auto_increment,
	user_id varchar(40) not null,
	pickup_time timestamp not null,
	pickup_addr varchar(40) not null,
	dest_addr varchar(40) not null,
	car_name varchar(30) not null,
	car_id_assigned varchar(30) ,
	time_of_booking timestamp default current_timestamp not null,
	price decimal(8,2) ,

	check(timestampdiff(hour,current_timestamp,pickup_time) > 1),
	foreign key(user_id) references custInfo(mail_id),
	foreign key(pickup_addr,dest_addr) references distanceInfo(location1,location2),
	primary key(booking_id)
);

create table carInfo
(
	car_id varchar(40),
	car_type varchar(40) default 'taxi' ,
	car_name varchar(40),
	brand varchar(40),
	no_of_persons int not null,
	car_condition  varchar(40)  default 'working',
	cost int default 1000000,
	charge_perkm decimal(5,2) default 15.00 ,
	rcharge_perday decimal(7,2) default 1000.00,
	availability varchar(40) default 'available' ,

	primary key(car_id)
);

create table driverInfo
(
	driver_id varchar(40),
	drive_name varchar(40),
	phone_no bigint not null ,
	driving_since int default 2,
	salary int default 5000 ,

	primary key(driver_id) 
);


create table booked_for
(
	booking_id int unsigned ,
	car_id varchar(40),

	foreign key(booking_id) references taxiBooking(booking_id),
	foreign key(car_id) references carInfo(car_id),
	primary key(booking_id , car_id)
);



create table driven_by
(
	car_id varchar(40),
	driver_id varchar(40),

	foreign key(car_id) references carInfo(car_id),
	foreign key(driver_id) references driverInfo(driver_id),
	primary key(car_id,driver_id)
);

create table car_rental
(
	rental_id varchar(40),
	car_name varchar(40),
	duration int not null ,
	rental_date timestamp not null,
	time_of_booking timestamp default current_timestamp ,
	price int ,

	primary key(rental_id)
);


create table rentalInfo
(
	user_id varchar(40),
	rental_id varchar(40),

	foreign key(user_id) references custInfo(mail_id),
	foreign key(rental_id) references car_rental(rental_id) ,
	primary key(user_id , rental_id)
);





delimiter //
create function getAvailability(pickup_time timestamp , car_id varchar(40))
returns varchar(40)

	begin

	declare answer1 varchar(40) ;
	declare busy_count integer ;

	select count(*) into busy_count from taxiBooking , booked_for 
	where taxiBooking.booking_id = booked_for.booking_id and booked_for.car_id = car_id and  
	abs(timestampdiff(hour,taxiBooking.pickup_time,pickup_time)) <2 ;

	if busy_count = 0 then set answer1 = 'available';
	else set answer1 = 'not available';
	end if;

	return answer1 ;

end //
delimiter ;



delimiter //
create function getCost(pickup_addr varchar(40) , dest_addr varchar(40) , car_name varchar(40))
	returns decimal(8,2)

	begin

	declare cost1 decimal(5,2) ;
	declare dist integer;

	select carInfo.charge_perkm into cost1 from carInfo where carInfo.car_name = car_name limit 1 ;
	select distanceInfo.distance into dist  from distanceInfo where distanceInfo.location1=pickup_addr and distanceInfo.location2=dest_addr ;

	return cast((cost1*dist*1.0)  as  decimal(8,2) );

end //
delimiter ;


delimiter //
create trigger costAssign
before insert on taxiBooking
for each row
begin
	SET NEW.price = getCost(NEW.pickup_addr,NEW.dest_addr,NEW.car_name);
end //
delimiter ;

delimiter //
create trigger taxiAssign
after insert on taxiBooking 
for each row 
begin
	declare cost decimal(5,2);
	declare dist  integer  ;
	declare pickTime timestamp ;
	declare pickup ,dest , carId varchar(40) ;

	select carInfo.car_id into carId from carInfo 
	where strcmp(carInfo.car_type,"taxi")=0 and carInfo.car_name = NEW.car_name  and  
	strcmp(getAvailability(NEW.pickup_time , carInfo.car_id ) , "available")=0  limit 1 ;

	insert into booked_for (booked_for.booking_id ,booked_for.car_id ) values (NEW.booking_id , carId) ;

 end //
delimiter ;



insert into carInfo ( car_id ,car_name , car_type , brand , no_of_persons, car_condition , cost , charge_perkm , rcharge_perday ,availability ) values 
 ('AP11S1001','Maruti Swift','taxi','Maruti Suzuki', 4 , 'working' , 600000 , 20 , 800 , 'available') ,
 ('TS11T1012','Maruti Swift','taxi','Maruti Suzuki', 4 , 'working' , 600000 , 20 , 800 , 'available') ,
 ('WB13U1221','Maruti Swift','taxi','Maruti Suzuki', 4 , 'working' , 600000 , 20 , 800 , 'available') ,

 ('AP06V2525','Maruti Omni','taxi','Maruti Suzuki', 7 , 'working', 450000 , 15 , 700 , 'available') ,
 ('TS06W2314','Maruti Omni','taxi','Maruti Suzuki', 7 , 'working', 450000 , 15 , 700 , 'available') ,
 ('WB08X9817','Maruti Omni','taxi','Maruti Suzuki', 7 , 'working', 450000 , 15 , 700 , 'available') ,

 ('AP14Q6554','Mahindra Scorpio','taxi','Mahindra', 6 , 'working',1000000, 25 , 1500 , 'available') ,
 ('AP15S4112','Mahindra Scorpio','taxi','Mahindra', 6 , 'working',1000000, 25 , 1500 , 'available') ,
 ('TS01T3134','Mahindra Scorpio','taxi','Mahindra', 6 , 'working',1000000, 25 , 1500 , 'available') ,

 ('AP10Y5111','Hyundai Verna','taxi','Hyundai', 5 , 'working',1100000,30,1600,'available') ,
 ('MH11Z1290','Hyundai Verna','taxi','Hyundai', 5 , 'working',1100000,30,1600,'available') ,
 ('TS12AA4194','Hyundai Verna','taxi','Hyundai', 5 , 'working',1100000,30,1600,'available') ,

 ('AP04Z1447','Honda City','taxi','Honda', 5 , 'working', 1300000, 35 , 1700 ,'available'),
 ('TS05AA3171','Honda City','taxi','Honda', 5 , 'working', 1300000, 35 , 1700 ,'available'),
 ('TS09AB1271','Honda City','taxi','Honda', 5 , 'working', 1300000, 35 , 1700 ,'available');


insert into distanceInfo (location1 , location2 ,distance ) values 
 ('Kukatpally','Hyderabad Airport',40) ,
 ('Hyderabad Airport','Kukatpally',40) ,
 ('Charminar','Hyderabad Airport',25) ,
 ('Hyderabad Airport','Charminar',25) ,
 ('Charminar','Kukatpally',20),
 ('Kukatpally','Charminar',20),

 ('Cyberabad' , 'Kukatpally', 10) ,
 ('Kukatpally','Cyberabad' , 10) ,
 ('Cyberabad','Charminar',15) ,
 ('Charminar','Cyberabad',15) ,
 ('Cyberabad','Hyderabad Airport',30),
 ('Hyderabad Airport','Cyberabad',30),

  ('Golkonda Fort' , 'Kukatpally', 25) ,
 ('Kukatpally','Golkonda Fort' , 25) ,
 ('Golkonda Fort','Charminar',15) ,
 ('Charminar','Golkonda Fort',15) ,
 ('Golkonda Fort','Hyderabad Airport',30),
 ('Hyderabad Airport','Golkonda Fort',30),
  ('Cyberabad' , 'Golkonda Fort', 20) ,
 ('Golkonda Fort','Cyberabad' , 20) ;
