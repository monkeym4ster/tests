update xzrake.infoevent set messagecontent='您的房东商城订单#landlordmallorderid#因未及时支付，已失效SC100' where eventno='SC100';
update xzrake.infoevent set messagecontent='您的房东商城订单#landlordmallorderid#已发货，请注意查收SC200' where eventno='SC200';
update xzrake.infoevent set messagecontent='您的房东商城订单#landlordmallorderid#已自动确认收货，如有疑问请致电小猪SC300' where eventno='SC300';
update xzrake.infoevent set messagecontent='您的房东商城订单#landlordmallorderid#已被取消，钱款将在1～7个工作日原路退还，请注意查收。如有疑问，请致电小猪SC400' where eventno='SC400';


update xzrake.infoevent set messagecontent='' where eventno='SC100';
update xzrake.infoevent set messagecontent='' where eventno='SC200';
update xzrake.infoevent set messagecontent='' where eventno='SC300';
update xzrake.infoevent set messagecontent='' where eventno='SC400';

