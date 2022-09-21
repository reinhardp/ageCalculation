# Age Calculator

## Methods
- There is only one private method named CalculateAge(). Which takes two parameters.
- Public methods are getAgeString(), getAgeArray(), getAgeHash(). Each of these methods takes two parameters. The first is the birthday and the second is date.
- getAgeString() returns a pre defined string of the age.
- getAgeArray() returns a array array(Years, months, weeks, days) for the calculated age.
- getAgeHash() returns an assiotiaded array of the age. Like {"year" => $year, "month" => $month, "week" => $week, "day" => $day}
- In the bottom of agecalculation.php there are are commented out examples how to use the methods.

- the two parameter have to be in the form dd-mm-YYYY. Otherwise a empty string will be returned. A empty string will also returned if the date is not valid.
