<style>
html {
  background: #bbc3c6; 
}
*{
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  /* font-smoothing: antialiased; */
}
@font-face {
  font-family: 'Shopper';
  src: url('http://www.shopperfont.com/font/Shopper-Std.ttf');
}

h1 {
  text-transform: uppercase;
  font-weight: bold;
  font-size: 2.5em;
}
p {
  font-size: 1.5em;
  color: #8a8a8a;
}
input {
  border: 0.3em solid #bbc3c6;
  padding: 0.5em 0.3em; 
  font-size: 1.4em;
  color: #8a8a8a;
  text-align: center;
}
img {
  max-width: 44em;
  width: 100%;
  overflow: hidden; 
<!--  margin-right: 1em; --> 
  height: 268px;
}
a {
  text-decoration: none;
}
#list li:nth-of-type(odd){ 
	
    background: #35353508;
} 
.col{
	    text-align: center;
}
.container { 
  max-width: 75em;
  width: 95%;
  margin: 40px auto;  
  overflow: hidden;
  position: relative;
  border-radius: 0.6em;
  background: #ecf0f1;
  box-shadow: 0 0.5em 0 rgba(138, 148, 152, 0.2);
}
.card-header h5{
	   color:white;padding:10px;font-size:14px; 
}
 td p{ 
          margin-top:9px; 
	      font-size: 12px;
  }
.cart { 
  margin: 2.5em;
  overflow: hidden;
}
.cart.is-closed {
  height: 0;
  margin-top: -2.5em;
}
.table {
  background: #ffffff;
  border-radius: 0.6em;
  overflow: hidden;
  clear: both;
  margin-bottom: 1.8em;
}
.layout-inline > * {
  display: inline-block;
}
.align-center {
  text-align: center;
}
.th {
  background: #353535;
  color: #fff;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 1.1em;
}
.tf {
  background: #353535;
  text-transform: uppercase;
  text-align: right;
  font-size: 1.2em;  
}
.tf p {
  color: #fff;
  font-weight: bold;
}
.col {
  padding: 1em;
  width: 12%;
}
.col-pro {
  width: 44%;
}
.col-pro > * {
  vertical-align: middle;
}
.col-numeric p {
  font: bold 1.8em helvetica;
}
.col-total p {
  color: #12c8b1;
}
.tf .col {
  width: 20%;
}
.row > div {
  vertical-align: middle;
}
.row-bg2 {
  background: #f7f7f7;
}

.col-qty > * {
  vertical-align: middle; 
}
.col-qty > input {
  max-width: 2.6em;
}
a.qty {
  width: 1em;
  line-height: 1em;
  border-radius: 2em;
  font-size: 2.5em;
  font-weight: bold;
  text-align: center;
  background: #43ace3;  
  color: #fff;
}
a.qty:hover {
  background: #3b9ac6;
}
.btn {
  color: #fff;

}
.btn:hover {
  box-shadow: 0 3px 0 rgba(59,154,198, 0)
}
.btn-update {
  float: right;
  margin: 0 0 1.5em 0;
}
.transition {
  transition: all 0.3s ease-in-out;
}
@media screen and ( max-width: 755px) {
  .container {
    width: 98%;
  }
  .col-pro {
    width: 35%;
  }
  .col-qty {
    width: 22%;
  }
  img {
    max-width: 100%;
    margin-bottom: 1em;
  }
}
@media screen and(max-width: 375px){  
	.col-name p{
	font-size: 12px;
}
.col-price p{  
	font-size: 12px; 
}
#myTable p{
	font-size: 12px;
}
 img p{
	      font-size: 12px;
  }
}
@media screen and ( max-width: 591px) {}
.quantity {
  display: inline-block;
}
.quantity .input-text.qty {
  width: 35px;
  height: 39px;
  padding: 0 5px;
  text-align: center;
  background-color: transparent;
  border: 1px solid #efefef;
}
.quantity.buttons_added {
 <!-- text-align: left; -->
  position: relative;
  white-space: nowrap;
  vertical-align: top; 
}
.quantity.buttons_added input {
  display: inline-block;
  margin: 0;
  vertical-align: top;
  box-shadow: none;
}
.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
  padding: 7px 10px 8px;
  height: 39px;
  background-color: #ffffff; 
  border: 1px solid #efefef;
  cursor:pointer;
}
.quantity.buttons_added .minus {
  border-right: 0;
}
.quantity.buttons_added .plus {
  border-left: 0;
}
.quantity.buttons_added .minus:hover,
.quantity.buttons_added .plus:hover {
  background: #eeeeee;
}
.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  margin: 0;
}
.quantity.buttons_added .minus:focus,
.quantity.buttons_added .plus:focus {
  outline: none; 
}

.eye_class {
  display: none;
  background: #f2eeeead;
  width: 80px;
  margin-left: 11px;
}
.img_div:hover .eye_class {
  display: block;
  position: absolute;
  left: 0px;
  right: 208px;
  bottom: 14px;
  text-align: center;
  cursor: pointer;
}

@media screen and ( max-width: 575px) {
  .eye_class {
    display: none;
    background: #f2eeeead;
    width: 70px;
    margin-left: 11px;
  }
  img p{
	      font-size: 12px;
  }
  .img_div:hover .eye_class { 
    display: block;
    position: absolute;
    left: 0px;
    right: 208px;
    bottom: 22px;
    text-align: center;
    cursor: pointer;
  }
}

@media screen and ( max-width: 575px) {
  .th_line {
    font-size: 12px;
  }
  .buttons_added{
    margin-right: 42px;
  }
   td p{ 
	      font-size: 12px;
  }
}

@media screen and (max-width: 320px){
.th_line {
    font-size: 9px;
}
.col-name p{
	font-size: 10px;
}
.col-price p{
	font-size: 9px;
}
.quantity.buttons_added .minus, .quantity.buttons_added .plus { 
    padding: 7px 8px 8px;
}
.card-header h5{
	   color:white;padding:10px;font-size:14px; 
}
.table th {
    padding: .50rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    font-size: 12px;
}
.table td {
    padding: 0.80rem;
    font-size: 10px;
  font-size: 8px;
}

} 

.footer_btn{
  padding-left: 13px;
  padding-right: 13px;
  padding-top: 5px;
  padding-bottom: 5px;
}
.carousel-item{
  text-align: center;
}
.modal-body{
  background: #dadada;
}
* {
  box-sizing: border-box;
}

<!--#myTable {
  font-size: 11px;
} --> 

#myTable a{
  font-size: 20px;
}

#carouselExampleIndicators{
  height: 268px;
}
#myTable p { 
  margin-top: 10px;
  text-align:center; 
}

@media screen and ( min-width: 625px) {
  .modal-content{
    height: 420px;
    width: 650px;
  }
}



</style>