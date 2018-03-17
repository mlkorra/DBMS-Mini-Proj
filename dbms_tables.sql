create table custInfo
(
	mail_id varchar(30) not null ,
	password varchar(30) not null ,
	name varchar(40) not null,
	phone_no int(13) ,
	default_addr varchar(40) ,
	login_count int ,
	primary key(mail_id)
);



create table distanceInfo
(
	location1 varchar(40),
	location2 varchar(40),
	distance float(5,2)	not null,

	primary key(location1,location2)
);


create table taxiBooking
(
	booking_id int unsigned not null auto_increment,
	pickup_time timestamp not null,
	pickup_addr varchar(40) not null,
	dest_addr varchar(40) not null,
	car_name varchar(30) not null,
	car_id_assigned varchar(30) ,
	time_of_booking timestamp default current_timestamp not null,
	price decimal(8,2) ,

	check(timestampdiff(hour,current_timestamp,pickup_time) > 1),
	foreign key(pickup_addr,dest_addr) references distanceInfo(location1,location2),
	primary key(booking_id)
);

create table carInfo
(
	car_id varchar(40),
	car_type varchar(40) default 'taxi' ,
	car_name varchar(40),
	brand varchar(40),
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
	phone_no int not null ,
	driving_since int default 2,
	salary int default 5000 ,

	primary key(driver_id) 
);


create table bookingInfo
(
	user_id varchar(30) not null,
	booking_id int unsigned not null,

	foreign key(user_id) references custInfo(mail_id),
	foreign key(booking_id) references taxiBooking(booking_id),
	primary key(user_id,booking_id)
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
	where taxiBooking.booking_id = booked_for.booking_id and booked_for.car_id = carInfo.car_id and  
	abs(timestampdiff(hour,taxiBooking.pickup_time,pickup_time)) <2 ;

	if busy_count = 0 then set answer1 = 'available';
	else set answer1 = 'not available';
	end if;

	return answer1 ;

end //
delimiter ;



delimiter //
create function assignTaxi(bookingId int)
	returns float(8,2)

	begin

	declare price float(5,2);
	declare dist  integer  ;
	declare pickTime timestamp ;
	declare pickup ,dest , carId,carName varchar(40) ;

	select taxiBooking.pickup_addr into pickup 
	from taxiBooking where taxiBooking.booking_id = bookingId ;

	select taxiBooking.dest_addr into dest 
	from taxiBooking where taxiBooking.booking_id = bookingId ;

	select taxiBooking.car_name into carName
	from taxiBooking where taxiBooking.booking_id = bookingId ;

	select taxiBooking.pickup_time into pickTime
	from taxiBooking where taxiBooking.booking_id = bookingId ;


	select carInfo.car_id into carId from carInfo 
	where strcmp(car_type,"taxi")=0 and carInfo.car_name = carName  and  
	strcmp(getAvailability(pickTime , carInfo.car_id ) , "available")=0  limit 1 ;

	select carInfo.charge_perkm into price from carInfo
	where carInfo.car_id = carId;


	insert into booked_for (booking_id , car_id ) values (bookingId , carId) ;


	select distanceInfo.distance into dist from distanceInfo where distanceInfo.location1 = dest and distanceInfo.location2 = pickup ;

	return distance*price ;

end	//
delimiter ;




delimiter //
create trigger finalAssignTaxi 
after insert on taxiBooking 
for each row 
begin
	update taxiBooking set taxiBooking.price = assignTaxi(taxiBooking.booking_id);
end //
delimiter ;



delimiter //
create function getCost(pickup_addr varchar(40) , dest_addr varchar(40) , car_name varchar(40))
	returns float(7,2)

	begin

	declare price float(5,2);
	declare dist int;

	insert into price select carInfo.charge_perkm from carInfo where carInfo.car_name = car_name limit 1 ;
	insert into dist select distanceInfo.distance where distanceInfo.location1=pickup_addr and distanceInfo.location2=dest_addr ;

	return price*dist ;

end //
delimiter ;


insert into carInfo ( car_id ,car_name , car_type , brand ,  car_condition , cost , charge_perkm , rcharge_perday ,availability ) values 
 ('WB11S1001','Maruti Swift','taxi','Maruti Suzuki','working' , 600000 , 20 , 800 , 'available') ,
 ('WB06V2525','Maruti Omni','taxi','Maruti Suzuki','working', 450000 , 15 , 700 , 'available') ,
 ('WB14Q6554','Mahindra Scorpio','taxi','Mahindra','working',1000000, 25 , 1500 , 'available') ,
 ('WB10Y5111','Hyundai Verna','taxi','Hyundai','working',1100000,30,1600,'available') ,
 ('WB04Z1447','Honda City','taxi','Honda','working', 1300000, 35 , 1700 ,'available');
