# Symfony Test
## _Challenge 1: FizzBuzz Twig Extension._
Using the Twig technology of Symfony you must create an extension that allows you to display on screen a series of 30 numbers from the number added in the extension. The particularity is that you must print on screen the correlative numbers and for all numbers multiple of 3 you must print Fizz, for numbers multiple of 5 you must print Buzz, and finally for numbers that are multiples of 3 and 5 you must print FizzBuzz.

The screen should look like this if the initial number is 1:

```sh
1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz, 11, Fizz, 13, 14, FizzBuzz, 16, 17, Fizz, 19, Buzz, Fizz,
22, 23, Fizz, Buzz, 26, Fizz, 28, 29, FizzBuzz
```

The path to display the result should be: **/desafio1/fizz/buzz**

## Challenge 2: FizzBuzz Service._
In your Symfony project you must create a Service that returns a series of numbers with the concept FizzBuzz like the previous challenge. This service must be called from a Controller which will display the result in the route: **/desafio2/fizz/buzz**

**The service will receive 2 parameters: Start number, End number**

The parameters must be sent by means of a form (FormType) and stored in an entity containing as attributes:
> - Initial number
> - End number
> - Time and date of registration entry
> - FizzBuzz generated (String)
