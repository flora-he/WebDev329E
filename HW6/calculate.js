function calculateMonthlyPayment() {

	principalAmt = parseFloat(document.getElementById("principalAmt2").value)
	yearlyIntRate = parseFloat(document.getElementById("intRate2").value)
	loanTerm = parseInt(document.getElementById("loanTerm2").value)
	intRate = yearlyIntRate/12

	if ((principalAmt < 0) || (intRate < 0) || (loanTerm < 0)) {
		window.alert("Enter an a non-negative number for any input")
	}
	
	else if (isNaN(principalAmt) || isNaN(intRate) || isNaN(loanTerm)) {
		window.alert("Do not enter a string for any input")
	}

	else if ((yearlyIntRate < 0) || (yearlyIntRate > 1)) {
		window.alert("Make sure interest rate is between 0 and 1 inclusive")
	}

	else if ((principalAmt > 100000000000000000000) || (loanTerm > 100000000000000000000)) {
		window.alert("Enter a smaller amount")
	}

	else {
		monthlyMortgage = principalAmt * intRate/(1-(1/(1+intRate)**loanTerm))
		document.getElementById("monthlyPaymentOut").innerHTML = "$" + parseFloat(monthlyMortgage).toFixed(2)
		
		totalSum = monthlyMortgage * loanTerm
		document.getElementById("sumPaymentOut").innerHTML = "$" + parseFloat(totalSum).toFixed(2)

		totalInterest = totalSum - principalAmt
		document.getElementById("totalInterestOut").innerHTML = "$" + parseFloat(totalInterest).toFixed(2)
	}

}

