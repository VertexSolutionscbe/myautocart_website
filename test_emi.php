<?php
// P = Principal Amount (Loan Required or Sanctioned)

// R = Rate of interest per annum

// For Eg.ROI = 9.25%
// Then R = 9.25/(12*100) = 0.007708333

// N = Repayment Period ( Total number of months or No of installments)

// For Eg. N = 2 Years
// Then N = 2 * 12 = 24 months

// PHP program to calculate EMI
// In this program, we got the input values such as principal amount, rate of interest per annum and Repayment period in Years. Before calculate the EMI, the program calculates the Rate of interest for one month using R = 9.25/(12*100) = 0.007708333 .

// Next it has converted the Repayment period from years to months t = 2 * 12 = 24 months. Then the function emi_calculator has calculated the EMI using the following formula

// EMI = [P x R x (1+R)^N]/[(1+R)^N-1]
// EMI Calculator program in PHP 
  
// Function to calculate EMI 
function emi_calculator($p, $r, $t) 
{ 
    $emi; 
  
    // one month interest 
    $r = $r / (12 * 100); 
      
    // one month period 
    $t = $t * 12;  
      
    $emi = ($p * $r * pow(1 + $r, $t)) /  
                  (pow(1 + $r, $t) - 1); 
  
    return ($emi); 
} 
  
    // Driver Code 
    $principal = 250000; // 2 lakh 50 thousands as principal
    $rate = 9.25; // 9.25 as Rate of interest per annum
    $time = 2; // 2 years as Repayment period
    $emi = emi_calculator($principal, $rate, $time); 
	//Monthly EMI is = 11449.883065458 
    echo "Monthly EMI is = ", $emi; 
	?>