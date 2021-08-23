<html lang="en"><head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<style>
.pricingtablecontainer {
  display: flex;
  flex-wrap: nowrap;
  overflow: auto;
  margin: 50px -10px;
  padding: 30px 0;
}

.pricingtable {
  padding: 0 10px;
  max-width: 25%;
  min-width: 250px;
  flex: 1 0 100%;
}
.pricingtable .js-yearlypricing {
  display: none;
}
.pricingtable ul {
  border: 1px solid #DBDBDB;
  border-radius: 5px;
  position: relative;
  padding: 10px;
}
.pricingtable li {
  display: flex;
  border-bottom: 1px solid #DBDBDB;
  padding: 10px;
  align-items: center;
  justify-content: center;
}
.pricingtable li.disable {
  opacity: 0.5;
  text-decoration: line-through;
}
.pricingtable__head {
  border: none !important;
  text-transform: uppercase;
  font-weight: bold;
}
.pricingtable__highlight {
  background: green;
  border-radius: 6px;
  color: white;
  padding: 15px !important;
  font-weight: bold;
}
.pricingtable__popular {
  background: #F0C80F;
  border: none !important;
  border-radius: 5px 5px 0 0;
  color: white;
  padding: 5px !important;
  position: absolute;
  top: -25px;
  left: 0;
  width: 100%;
  text-transform: uppercase;
}
.pricingtable__btn {
  border: none !important;
}
.pricingtable .popular {
  box-shadow: 0 0px 10px 5px rgba(0, 0, 0, 0.1);
}
.pricingtable .popular .pricingtable__highlight {
  background: #F0C80F;
}
.pricingtable .silver .pricingtable__highlight {
  background: #00CE6C;
}
.pricingtable .diamond .pricingtable__highlight {
  background: #65B2DE;
}
.pricingtable .platinum .pricingtable__highlight {
  background: #A182D2;
}

.slideToggle {
  display: flex;
  justify-content: center;
  margin: 50px 0;
}
.slideToggle i {
  margin: 0 15px;
}

.form-switch {
  align-items: center;
  display: flex;
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
  justify-content: space-between;
  margin-bottom: 20px;
}

.form-switch i {
  position: relative;
  display: inline-block;
  width: 100px;
  height: 30px;
  border: 1px solid #DFDFDF;
  border-radius: 15px;
  transition: all 0.3s linear;
}

.form-switch i::after {
  content: "";
  position: absolute;
  left: 0;
  width: 40px;
  height: 22px;
  background-color: #00CE6C;
  border-radius: 15px;
  transform: translate3d(4px, 3px, 0);
  transition: all 0.2s ease-in-out;
}

.form-switch input {
  display: none;
}

.form-switch input:checked + i::after {
  transform: translate3d(54px, 3px, 0);
}
</style>
</head>
<body translate="no">
<div class="container">
<div class="slideToggle">
<label class="form-switch">
<span class="beforeinput text-success">
MONTHLY
</span>
<input type="checkbox" id="js-contcheckbox">
<i></i>
<span class="afterinput">
ANNUAL
</span>
</label>
</div>
<div class="pricingtablecontainer">
<div class="pricingtable">
<ul class="silver">
<li class="pricingtable__head">Silver</li>
<li class="pricingtable__highlight js-montlypricing">$09/Month</li>
<li class="pricingtable__highlight js-yearlypricing">$09/Yearly</li>
<li>Option one</li>
<li>Option two</li>
<li>Option three</li>
<li>Option four</li>
<li>Option five</li>
<li>Option six</li>
<li class="disable">Option seven</li>
<li class="disable">Option eight</li>
<li class="disable">Option nine</li>
<li class="disable">Option ten</li>
<li class="pricingtable__btn">
<button class="btn btn-success">Start Free Trial</button>
</li>
</ul>
</div>
<div class="pricingtable">
<ul class="popular">
<li class="pricingtable__popular">Popular</li>
<li class="pricingtable__head">Gold</li>
<li class="pricingtable__highlight js-montlypricing">$09/Month</li>
<li class="pricingtable__highlight js-yearlypricing">$09/Yearly</li>
<li>Option one</li>
<li>Option two</li>
<li>Option three</li>
<li>Option four</li>
<li>Option five</li>
<li>Option six</li>
<li class="">Option seven</li>
<li class="">Option eight</li>
<li class="disable">Option nine</li>
<li class="disable">Option ten</li>
<li class="pricingtable__btn">
<button class="btn btn-success">Start Free Trial</button>
</li>
</ul>
</div>
<div class="pricingtable">
<ul class="diamond">
<li class="pricingtable__head">Diamond</li>
<li class="pricingtable__highlight js-montlypricing">$09/Month</li>
<li class="pricingtable__highlight js-yearlypricing">$09/Yearly</li>
<li>Option one</li>
<li>Option two</li>
<li>Option three</li>
<li>Option four</li>
<li>Option five</li>
<li>Option six</li>
<li>Option seven</li>
<li>Option eight</li>
<li>Option nine</li>
<li class="disable">Option ten</li>
<li class="pricingtable__btn">
<button class="btn btn-success">Start Free Trial</button>
</li>
</ul>
</div>
<div class="pricingtable">
<ul class="platinum">
<li class="pricingtable__head">Platinum</li>
<li class="pricingtable__highlight js-montlypricing">$09/Month</li>
<li class="pricingtable__highlight js-yearlypricing">$09/Yearly</li>
<li>Option one</li>
<li>Option two</li>
<li>Option three</li>
<li>Option four</li>
<li>Option five</li>
<li>Option six</li>
<li>Option seven</li>
<li>Option eight</li>
<li>Option nine</li>
<li>Option ten</li>
<li class="pricingtable__btn">
<button class="btn btn-success">Start Free Trial</button>
</li>
</ul>
</div>
</div>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script id="rendered-js">
$("#js-contcheckbox").change(function () {
  if (this.checked) {
    $('.js-montlypricing').css('display', 'none');
    $('.js-yearlypricing').css('display', 'flex');
    $('.afterinput').addClass('text-success');
    $('.beforeinput').removeClass('text-success');
  } else {
    $('.js-montlypricing').css('display', 'flex');
    $('.js-yearlypricing').css('display', 'none');
    $('.afterinput').removeClass('text-success');
    $('.beforeinput').addClass('text-success');
  }
});
//# sourceURL=pen.js
    </script>


</body></html>