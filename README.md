# Test Symfony
## _Desafío 1: FizzBuzz Twig Extension._
Utilizando la tecnología Twig de Symfony deberás crear una extensión que permita mostrar en pantalla
una serie de 30 números a partir del número agregado en la extensión. La particularidad es que deberás
imprimir en pantalla los números correlativos y para todo número múltiplo de 3 deberás imprimir Fizz,
para los números múltiplos de 5 deberás imprimir Buzz, y finalmente para los números que sean
múltiplos de 3 y 5 deberás imprimir FizzBuzz

En pantalla deberá verse de la siguiente manera si el número inicial es 1:

```sh
1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz, 11, Fizz, 13, 14, FizzBuzz, 16, 17, Fizz, 19, Buzz, Fizz,
22, 23, Fizz, Buzz, 26, Fizz, 28, 29, FizzBuzz
```

La ruta para mostrar el resultado deberá ser: **/desafio1/fizz/buzz**

## _Desafío 2: FizzBuzz Service._
En tu proyecto de Symfony deberás crear un Servicio que retorne una serie de números con el
concepto FizzBuzz igual al desafío anterior. Este servicio deberá ser llamado desde un **Controlador** el
cual mostrará por pantalla el resultado en la ruta: **/desafio2/fizz/buzz**

**El servicio recibirá 2 parámetros: N° inicial, N° de término**

Los parámetros deberán ser enviados por medio de un formulario (FormType) y almacenados en una
entidad que contenga como atributos:
> - Numero inicial
> - Numero final
> - Hora y fecha de ingreso de registro
> - FizzBuzz generado (String)
