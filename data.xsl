<?xml version = "1.0" encoding = "UTF-8"?>  
<xsl:stylesheet version = "1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">     
    <xsl:template match = "/">   
        <html>   
        
<style>
                body{
                    background-color:#fef7dc;
                }
                body{
                    padding: 8px;
                    margin: 60px;
                }
                
 </style>
         <body>  

            <section id="title" >
    <!-- <div class="container-fluid"> -->
<div class="bg-img">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a href="" class="navbar-brand">Honey Buzz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link nav-item" href="index2.html">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link nav-item" href="product1.html">Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="service.html">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link nav-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="about.html">About Us</a>
            <a class="dropdown-item" href="contact.html">Contact Us</a>
          </div>
        </li>
        <li style="float:right" class="cart">
          <a href="cart.html"><i class="fas fa-cart-plus"></i><span>0</span></a>
        </li>
      </ul>
      
    </div>
  </nav>
  <h1 class="product-heading">Products</h1>
  

</div>
</section>

                <h1 align="center">Product's Details</h1>
 
            <table border = "1" align="center">   
               <tr bgcolor = "#9acd32">   
                  <th>S No.</th>   
                  <th>Name of Product</th>   
                  <th>Cost of Product</th>   
                  <th>No. of Left Product</th>   
                    
               </tr>   
               <xsl:for-each select="store/product">   
                  <tr>   
                     <td>   
                        <xsl:value-of select = "@id"/>   
                     </td>   
                     <td><xsl:value-of select = "name"/></td>   
                     <td><xsl:value-of select = "price"/></td>   
                     <td><xsl:value-of select = "stock"/></td>        
                  </tr>   
               </xsl:for-each>   
            </table>   
         </body>   
      </html>   
   </xsl:template>    
</xsl:stylesheet>