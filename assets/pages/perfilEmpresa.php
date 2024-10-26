<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: /proyecto-sigto/assets/pages/index.php"); // Redirigir al login si no ha iniciado sesión
    exit();
}

// Obtener los datos del usuario
$usuario = $_SESSION['usuario'];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Eliminar todas las variables de session
    $_SESSION = array();

    //Destruir la sesion
    session_destroy();

    //Redirigir al loginsss
    header("Location: /proyecto-sigto/assets/pages/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Empresa</title>
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/index.css">
    <link rel="stylesheet" href="/proyecto-sigto/assets/styles/perfilPersonal.css">
</head>
<body>
<header>
    <div id="logo-sigto">
        <a href="/proyecto-sigto/assets/pages/index.php"><img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-Sigto"></a>
    </div>
    <div class="menu-primero">
        <div id="menu"> 
            <img src="/proyecto-sigto/assets/img/menu (1).png" alt="menu-burguer">
        </div>
        <div id="logo-sigto-dos">
            <a href="/proyecto-sigto/assets/pages/index.php"><img id="logo" src="/proyecto-sigto/assets/img/logo-sigto.png" alt="logo-Sigto"></a>
        </div>
        <div>
            <input type="text" name="buscador" placeholder="Buscar..."> <!-- Placeholder para el input -->
        </div>
        <div>
            <a href="catalogoEmpresa.php">Catalogo</a>
        </div>
        <div>
            <a href="#">Ventas</a>
        </div>
        <div>
            <a href="cuenta.php">Mi Cuenta</a>
        </div>
    </div>
    <div class="menu-segundo">
        <ul>
            <li><a href="#">Todas las categorías</a></li>
            <li><a href="/proyecto-sigto/assets/pages/ofertasSemanales.html">Ofertas de la semana</a></li>
            <li><a href="#">Cómo comprar</a></li>
            <li><a href="#">Costos y tarifas</a></li>
            <li><a href="#">Garantía de entrega</a></li>
            <li><a href="/proyecto-sigto/assets/pages/administrar.php">Administrar</a></li>
        </ul>
    </div>
</header>
<main>
    <article class="container-info">
        <section class="info">
            <div class="container-contenido">
            <div class="img-perfil">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAN4AAACUCAMAAADLemePAAAAeFBMVEUzMzP////l5eXk5OTm5ub+/v76+vrj4+Pz8/Pt7e39/f3n5+fx8fHo6Oj29vbw8PDs7OwAAAAuLi4pKSkjIyMbGxs/Pz/a2tpZWVlGRkaXl5cTExNjY2PGxsadnZ2ysrLPz89OTk5wcHC9vb2Dg4N7e3uOjo6mpqZj9CbXAAAgAElEQVR4nLVdaWOqPNOWsC+BCCjWpWq17f//h+8sgSSImp7nfvlwPNiYzECSmblmySoIgiSMwjoIYiVEXgRBFkZlEgQFfJvDX5WIZBwEdUSNCmikAmokoFGQRqLBRpGQcFuXUcSNIhngb5SM6yq/3H7396/dx3YF1/Zjd/ze304iTceeUvhpIqOwAiIa+CkQkaQ0XCAialRFRBM0ouGgURRPhAdlJHK4rURUwm0CRGCjHBqtbPaiRfaiP7FX2uwNl/Pn965frw+bvmtX+mq7bnNYr/vr9+dtUHWj/gv2iufspSIl9sJQwY+yVETIXiqYvVAIZE+INEPKoVFAjUJiT6TEXhgSe5EQ2EiGURak5/tx2x8svmZX1x82H1/33wsOk5RhWiHl0FMx0RSEIsQHVQmBTxMaEU1NKoQhPIgEEV6FYVSbRgoarZIkqVWeZ/DZ5HkDH1me5zV85tO3OTbS384auT+t9W+SQuyPH+1zzqar7fr2Y/cJ5FR5XunhaqJJZUyENdzYf/WuUaUbrUKRKn78ET3+kKaISsMIZxc8HnxHIqR3lKchTZGQGgUyDYVpBK8sxYeWSRmer2sP1iwW19czrJ4sDAU+fskzBN5RSmuH5g2SqHDtpNSoCEMiPIdphG87CrERzkBaSprwVQTzFrviyQ2LRyB7MG9LpBwmN3wbR9OUl7wCooo3HcGNmD1oBD2r00+/7nxZmybqut8PKi9pdkkRKR6O2BNRSOzBqi9oOGwUAxGKVxixV1KjAm5xnmrCg9X0EFJ8ewnsZ7SW4JZeTEgPIUz120v57aWpfnupaVSU2Cg5f3ebv/LG7/DQff+GWc098duj/hP4qJkmojwNaSMUqSY8TAsmnN5emkqL8FUNV17lGX40TQMfWTPe4gdN4QS+1Y0a3QhuzU9h2uO3cX0+tv0/MUdX3+5+M1jO3L/CjnFR023DwzVNZUYfacqrZmw0Eg4UV9BYC4ZUyz3aOeHt24IhFCXtnK5gSPntw0ejJ06Q3Lb9n2ele3X96pyrBcEQ0m4O05aXEpBI75UIN3JP8M4piKY8HOWeFgwgCUjusWAItWAQguUeNTJyT7jsqfJyXXvvJs+vdn091YZywcMB5Sz3mKYGSLTZg28d9gSzB4IhjuOklFEdx4WSZVPEcRZJmdC3ZRPEQV5KCd/WkholeVnm2Aj+Co1iAY3go8lO35v/8c2NV9ffL7ATyhKGC6SUCvqH7ZhoUkRT0TBNptFIk6ypkYRGMRK+UkqhzMjhkySJUiR94BMliVSSpJv5VjfK9G9IbKqq+Nn+D2tufvXbex2D4FJKJs5wKIAzfasJryYi6NtmakSEr4R+3fz2Ue0gwQALjjagiOXeOJtJ9cK3X/GqDLGRaE7X/j+Yl+Zq++tAK0zLPUcwgDKCS6nkaQs0sdyjRiDRBG+vWjCIaTZr9kLNniPWXfb4GQSS2SvS/eE/mpfm6g77HPeER7Fu2As1eymzp8W6Zk+LdXiZjaUL5TQNYVOdJoL+NuOJ0NSs/LAmhvMiGHaH/5o5vNbHS5bTvOPRQfXm0YHijDVJ1sRsEq1GiiZnUcAKBWUhLgpVRjncZlEJy7go4NsmKIIcbuHbWpYCG+VRlMfUKIJGcZSfP/7DVWdfm+0NNsWyVDhcCTQBpUBiA7cN0gSbiCCaYsmEV/At3CayLDXh5UzuaYPIkXujYFg0iNTPf7vq7Kvt9kH5RDCMco8NIjHKvdIRDA9yzzaIQl5wk1g3VpMxiLLd+v+LObzWu0jNxDrRNMk94cg93WgS6yD3sixDRSurs7pCjQfu8dZ8wGdlbmu+rek2GXb/pl96X5vrUNtEVBMRNokzSqvptplUajaIEjZ9jEGkVWrXIBJsEKE8+P/lDnbQ3RA8UalDV6XWBlFKk2tSqX0MomBmEJVsEF1Wf5AHYJqvx+svmmm3HfKXBlE4M4hcuYfsgV4DGyJqPTVRHqPZJEGvQT0avi2QvSJG24oaRfQMBl8Vs+261fb483tKm6YchtPt57gFdn1/vb7kIgPFTMGejaoXsgc0kbIdE+xCKmSEjcjeQxUSdz74zcooNCg6RsHi6md5PelCJFhQ3GQXT3O83WyP+xu+fFjjVVIUCfSmLp9f241nB/0lsATwgiamCa804boRqpAzKCl3ds5UG0SR2TlHKCk5bf1m2OHj85JmMuP1TXiThhxO+62fPtB+DPUIJU061gxKGndOLRhGDGxZ7r3HOcMPL+769Sf8uCRNL8B1kZDliHBa0Mhhf/Dam7rrIDUQKCYgMPDCOVFrwVaotSB7MLmhFc5mWHeoIeQ8uZE9nNy8wDMvA6Htv0AzpqVbFQWpuwktaFomMpJN/uW1BPsPbY6hOQuUAnulITyQERGOZgE1Qm6Z8FU6YS1CYy0Vb8JiEWsh6RFFRx95t7mCVhUxapOlKc1tyQhJBbfwvAvRnK9eXR0LIxhSemXpEtYSzLGWRcFQGMGQLiBl6sePJNT3NcgNU4IWnOLhYB6JAo2NqBm+fFbgZk9z2xEM4g9I2R9wzuDss+4O9wHbliHBzFlIwjjRYGgFspnYg/4zr4fV3aoJ5ySxHvIetyDWbYOIFLI6yRgAY/2sRv2sQXhM35pGVV0Xw9ZjvfSfoE0h1DXCb9w/KkyJuSXVLtl78NduLxmjZOan1awnTbh1u7KARMmTG2Fg8jHwg4bnEdLrDrX0SHce28rhU68AeLJxGo4LWhb8LS6TkmcIyKHs14O/fpfBFExT9jGEoUU46mcxTQnaPyJelUi45SEqHjxEYslDlP14GAmbn1ovXZyCrOXgMrEEw6hVwXBhsPdYf+u9p4dIzj1Eqfv20pDeXqrfXspvj7e++uTxpA93doBBFwVvcnrj5beX6rc37alF/OPB3+EST28vDS3CxYhqp+Pb04SnK+1dqR5cMKT1yFxqPxCrOXnW7N7vK/0xLyy3U255b5oR5cgJLJDcSDXp8f2M73b6p6MDa3QLsW9KI2VEeKZHfw4l2UhZNOG++c97MkCJYoWJASBBOyeMUxtzG/QnLRhodkmRXz7e71f9PngBJYUulDRaDItAoJZ7I3uMRedCnjx2zcNZAwWZwTIyxvATxfpgFUYue2F9ez89Yfe05N4IBL40iBDhBb2mKSUpTHCbIWAEt6DX1JFEwKiQiF9jo/z7/crrjzXaBRH1FCiNBUkElAuCmaFDBJTtRkBE4DE9N98JaB6IRRNNeVDEQDjpZ5rwBoYrigIa4XAF6Jw4SFTDJw6S8NBwSyB8QZyW8C0xDjbeWxJW6zRWUuIgGT6dgiipuCeV0NAyg/6BcVnQcNgoyb36viikqZmejk14pQknTJ6Gk3+0GFqPqflpQgcmwbBkMWitKhu9n8pDurdtZiNlc4tBI2UsPd6GDsztveT2/gG32wGNQr0z0bJHy7Gy7T0G1Ud1TfuuS3nxWNfrc7Jo7yHhjbb3IhPzwO7LRnsmc/YNjpoYfcueSULI8qvH7nbPLB/n6HR0PJ+T/pTbTkcY7u6xK19VYmgyHVem40zzQe5LjbU0GmuRqGCMWAsr3nEcl4y1/Pqo0mfYX9FcTHEKxqT0wE8zGIecU7hzxjEoGBFYaLgAsBEqMNDo5tF9+5uRVVfICWsRI9ZChAsHaxkNIvEEKUsNUpYf37PX7qKIraZJMLgG0SQYIlswRGTrNLv3s6M7guVuG0SvBcMbsS4ssX7zUKW7H1hpUts62q9jiXWEahyxzosH5B6yF9w9pkd/VizWwyUPUR6GjlgnOLcidDer+FN/mG8Z9M2/PNjrb4nTBYHKpt+ljpvxr01y82HvS9W6/7pxCB77t+6tnTOYds4wsg0iMHTxeZQXLxN9hNOsnRMsT94501AbRIs7J5hJmc8QhwENImfn1AaRDroCk5yDV0ToL/eyu8/YfZExnPZC7oVa7glX7uGy8HqC9wcP0TwywniICtJPUPgnr7WWxscX1H8lFSkkqNNNCsmi1lJAI2k1gtGrwGf+r9YJksjqVgmUxlJrLXLUWuSktagJ0s3rJQ+80qEDydkL8fkJMrcnpeZ+3kbfJvxXOyqg9oElUGV/FzpQj95ZwXaFsRie+NYTj00blYqgSsUYsainIENJywbR5KAjlCj3eobtLkD0bh46oHdO17f+zCASttyDni4e4wJ7J6R8jDcdDaJgwSCa2XuC2fPQ+vAaHg2iJ5ERMFEprgV0fJpSUpLfBG51XAvNIVnvvUD39YArgA19JWlyjj3J8ZamFIbhoLU+NcoJIzh5sdftYXZK/k3DPSHhGfNBkxOXIU5Oa3+VYbokGFLc5JMvP/YupVbOHcFgVGpXMGg3Nm2vFI3rYxQBe19pNBcMgYWUTYJBeMRSk2AYPLRpYk/asdRzpEwsI2UmltqPvfZ6UYSUpX6x1AxhmrcnXLFexl4KGbJ3YvZS/fZCNoieiXV+e+Eo1qvg4rf2OlDMDOFPxXoYklLmcXkB5cAe62TuVXuOkWU+BiVemx/Pjk00LvsYxMzHwI6WaPAwFvACkQQKU1nwk9VYdElTMGQPUTjBzAXPEJpdQAQuC/Xr59Dsjk0QPgsd4FjqBw+RXPQQUSy1HDyd/SDWwdZxDKJnHqIFgwgmiWeoRZcGz2Op2Y1EUUWrdATkJ/+ejqVm/x7DzKXnpIHHilgxU85YNHRIb8/170Ej9I4VGmaO0hSfQZV4YMR0gXyd/HtEIsZ3O7HUKb89RM0wahOxKiUbih4DhQZVNyUrdHLCbeClLOF1SLK4ICWL0D9FgJZSqGTGlVQ5YW6gP6EzGK5Zo8A3+G7z2RjCY8WEZ5pwvEVMUI6hAyaWejnYOPBcejDuUFsWQ8qCQcwsBrFkMYBiVkvfpwiLL7aDjcUsdMCNKVs2iCz2vOPiut/4PXta7j0YRImXX5SuvrbZi56yF8cBQboBxlJLBIwytFsImcOQ5AC1qsw7MK77wiWFvwmoJ9pECUGOY9L0AoKZsyCOpWlEHm1Qrr692VsrIDxhwhE1zpFwVCxpOCIc9DM5Yi2gMDGURCKxyI1WhSvUU9quUKEYSg48Sw2aSTsnO58Za4lRf4oNICPZr5z6qUbE3qADbJow5J0znDK4/ppkE3jZKXx1v/lLwSBeCAYvoFGzd2texpSFE1I2Dx1wIgL5IXhvnGivp1Fp23uhFutCi3W29zixabL36O1l3/4BhofPagwd0EjZTKzrt2fQJf0xfdbTbeABH09Xd6lnPb24tTGu5PKHQMH+O3DhsUeUjJSyYIrGLR6zUDjBJEy85QINnIw752jrCB10xYH0GB/m7JyCLQbpBbSMD/FoGUQlE/4QbOwXUyZqX2WCrvUl+BeDqPHVjOgiQMIzd3YyZ52IQJNcmvnvaDjyNskZwnxmzvKeKh1zNs59omXMIB/u27MDrstwDAIXGDqA7hTKY0CfS84+F32LHv66TrZ/GBiW/T6AH2HiJ3qHxgy1qeOGvDeUNWc1SjxNrvHaZqanmruw+teE18+RMkvuFX8aGK6TFTowQ8qWfQxh4+Mdcq7JhTLzMbhI2Zscon9ir/sYHpEyoZGypciIUl384kOtq4wWgEDjIdIuFFSvk6TILTS0QPxJqYLhrjopkj+OvNocZYEgWJGQXQD9jylZZJUQBKcMUlZUg0fcwOxCfBj6b+SYJkZIWSMZxtWpayvr/zlxSkPXPDRQQoz/dWjgLyksHJGZMEPTI0TGof8Mv/WKD3UvGEATXuhXZGHquX5FbhYKC4Z0ZhBF5Z/HXm2+LMFg5N6SQZSq6usfsj0KV+49yb40++s8VHwSDJH8++Dw/tQUOjCx54QOjOyp4R/e3SJ7rkE0hQ7o7bkxe7jearXIyP4mGEb+QLyzXDE9NY/Cp7j8U6bOtngqfHIjMibBwAZRwoIhUK7z2SPeS19tP+0RPSaoTc5nFgy2Sk0GkcxvU4Ic/NZ/nGv2zPksg78aRJ5aS3tYr+73KbSna38qqgXy3CBS5b0dJUK7un+v1gfPoXa1V0zZTO5xWmwxCx3w0jm77uMXBox/TXoKvEB0lhB7Qjw6wJLzanrZbXcu8mb4/Wh90lu6IyxhnnZ27myRzyICH42IuSe+qgIPQ6xbfZ3QRV1lwbmbnka73p2ipM6amTGEOXKJPB1NGlLXnQMEnovidPRIvervwURpXT01uuydc+4hGoOuwurzrbW+2Z0LBrnhGZ6tJI5u8/V7Uk0dsI8hIQQZIdXh82hluverc8Yhu2Gubu+30s3eUqm1j6ExPoapXouxK54ZRGBevLVV1vcBf6qr7QQnO0ml7z++9ifgGnZQFAhBkkSnz6+rnebWby/5WG0H5lz+Nl57ff6rQRSbgijM3mhXhOqdX+rw2ZRSYxm4ApphZ6d3tR1cq+N9//t7Pn/eYfLBZf99c8xw7lDOI7uRft9sMWBUWnIvJHMWd/86mKrtkFhHJyeGZqGTE+hTBNIVOdUyIIgwQaTtJXtt+xsUhORRTQaG+/ar2Xptu35zwOshObHf7kGvKqiSjawZE8zOr2Mr15kGG4FwgnYUhpvGBYKNNI0YInz0rYePwcZx/XJr6fc4QKHTdrVvPbh5FpHoDt9DpfNnIqHL0cAE/Xw1ZtsG0g0d0IJBPWRfLrNnh4rHzSuwpf+SInHYY+w2vX28z89s1x+wLOUCe8krRbQ7ztnTgmEKFY/SySAqiphqYBQF2RXa/RBPPoqi+Xw+VHtocvKBsAemIFuHPDB5fl4dXs2xtl2vzhUW58BolCImlT8mHwhsFcWL7MzDPqBG5JeRmvCaCdduGiLcK00jDV5ELBxO/NOy4FwOQol0LSJV33bbJ1mybd9tjyedpoF4E7vetP8MaFKn5+JofcPJVSynaYjJp5f6JdkE6dPJuflmLHqxDFsYKZBv3x+bjcti2x82V5AWtYWUSVYHTRk2UT+PYmsH+Yckm5ehA5iO9HTxtbh0OL6AxToj/U7oQHI677+uG0zpho0T/t18fP+ehjSX7NicQgfGJDrtu06eppp1xyEyhFuhA4LF+kT4+9ABxpyf4Vj9z0KswLwHTIWRmNF9PoPkOw0yp2Dq9z98ho4fft7+lq8xdKCZfAzpQuiAUE88b+1HOhXykvz4Kzd0QEfwZFFJmY0Nay7VYugAvHyhrSai6WlsfH8z0bi+oQPLyaVchk1dlm0i0GznZdjehA688hDpApFTGbYwW3b4tdfheSx1tOQhakzNCM4kdJNLo3Q56GqdGrSwnPJGSzeW2g38cM1Z4yGKWSOvqSddRE8uOxa774TfuPX2LA+Rbc5a8WU63Czj6LnEBNPJJAkWQ+baa8IhdjriLlPmVsfJJdyTE4cn58F0Nd9WHEynDE3B4uzs9rVUumM3Dm8M+xuD6eYulNjyEDnlaIbFl3eTUxk2XcAyskMHwhe+9cVgYzJPtWCg93pefH0XJZbL0SyGDqSmDFu8AARSkk2wEK7a9pnxktn1OWdJNjMHmEHK7FBxKVKHPZ62YmHHbnfFu6IKExBoReZagcCz4mTwsfQcN/fluhl2STErpHgW0KyB8cdyU3a08FLizfqcPJbEeAxoppIYYzaYpJQxnPIY651zGHddThlqWfLI3uGcm0aUmldQmpkaU/M4jJty3XQYt+LhKit/D+NuoFFiN0J1EhuJYMGSXlc6kj3nXLcp/44JJ905om+LN9mXoZV9+aAitR8XGViCgefEQrDxYvalIxhGiyEyFoMuwzY8gJCbe+affRmKmVh/WnVgmGu4/Vc6q67qiPVZ6IATEVhxMrwbOoDRIY5Yx+qqj/EEG474jVyxbqqrKlswPKJkrk+/GSMIajX3fff72s2SmQFt9h/HW6t/qjo1fev+1HSR7OejfufZcsduT/St40J54mMIuZCXOs+f4xkrG087Z8FRAZxkIyzns+1jKCwXihtLPRcMurIx2Iwz9m6vCnnxzhn+JXRAJ5fKWcwq5W+nM7nnlt1+lVwau8mlui51MK9LrU7u4uu/GlOOZp5kEz0kl8ZceIbqc1JVl8CUoxGNyS+sS5H9ukbbDqgKTaMkJnsPAR2yEWOql1BwJakKy01RORpkL8JGFBlBw2EKJNl70LbhclNsysVBVKauwO3OQczlaEwjLkeD7EkuRxNRfU5kz8rEzOzEz1n2JlXAVY5e3X0l80Zjbqr9bW4nfr5JO80fRq/r2Jkz7a6qnuS+0m2VO/2PHqKcNbGaExExed9NsqFNMXFCnbufjOpuTDunhpJSsRx05YQOzIKudJKNXrpuXeofm731LdFVB6JZ0JWYds4XIXMPci+c5B50ldnAUH/OhVOXepR7kSv3Ip1k8yq59LncA7XT2tHa7UO1nfdVB3Q2mBb+Wmuh5H2TV0/Z8Mo2UPpbVZaFo7VUDwpJIctRISlnWosuCJBxXr2yUusUazrQKCqK4GKxtx4CK//uidZiEY6VrgjSpYS6kkKSkT7QiUqqf8Clfwsqt1AHiaW6dEfYIICJihsBfTGZMTHn7wXU05i/h6pXQ5zGFK4agyYGt1Yj/XQao9NRESsVHs2M2XwrLL3JpX+xsCjWvyKdLteE12N94CL2rTpg1+e04YFunzwIBn+D6CHYeBQMwhYMUWktvXZ7UbP6nMt1qV/W5wznMWVWfc7AUiJakLAjeybYb4m9uUGk7T0t1l/Ze/nZghD7n/xlXeoFsc4VXThRMtd2xZMDC9j4sDy17XrIzIEFTtVcLgqT5xxSM5WKaaySN6aeDJsxuTatuBAO15MJLhaO3x2riklsHqrlVFbJm9wcfbAy2Q6zkvdjmgZuQFbJ+/hiCYe2V1MjLnkfzNM0ooc0DV0NyE7TKLnMUMYV1kzJezXYW/XmkpkybHHolabhlWTjlGHb27vnMfojUvYqyUaD3BNSpga7qNb6J/vnAwvU+PYmnNMpohdaBxZkdhwKqICJgZl19pONc4KhMmLRVpINGERURM/gnPT2wtB+e3Vq2yj90a2u+ixFKnVwzllhs3pe2Cyp5nXOMgdc3XxVCTWyVa9qqUSaruI29dSYUm+LddQyZbvY2+1QzKu46eGSBcJ1I9vHYKoOzNITxzJsOlGgcmofHED8TUe9cOjArOqAnZ5IO2cY2uqagUkt53OSKnG0VcCWnOlmhryuOjD5GILgeXKpWK7PmbuB/4evcvIQRXMPkZZ7vsmlxkOk3NKIm32u3Uh2Gba/JJcGel1k7CYzHiLa5HQZNpzcKnADFGF/aZb9e2MRvdQtojftqZFelZZ/L+eeAjfCc3NUXDpzVoYttP17lfHvTW8vmmp1culfkPixLkdTxFyOBvQzLEdD9UO59K+UTqX0DhPJqfIpaorGYMu4NKjkmqZTOZqYGkW6fqhuhHW2Mnz5ZLCpi1Obtr9m7DY3pX8TTXgTjuVoQi79C40M4f9YuFkOV8cKW5+SQE+cuWBYLkezLBh4bidKnR2vfHctg4XCzZ4xZSw+/A4s4LLboHrNALrDPm/CRXvPJ1Tc2HtIeZC6ST3txykJHg4siMRo79lFFeb23qwkhj6w4LEkhoVFEzgcX1x/cn+8JKwaPWDR1hkY9QxQdisv01kE9WzZYeHmTIPcTf3QU6XmBxaMcDnFUj9gLVPp30jDKFjn1Sr9C/sdHk4i8osb1oExb7hpgZWUKK7aDT2lCVfIZqwlUlxEOKLSv7gA5lhLnNW/nYtYgY1Hk3ms6stYS8RYi6CzUDTWMi3dKB+xFg+D6MkJbvkwK029Pg5KLiNly4JhCSkbZmcEdCsMr1o4wc1ItLcxZU5N+cfQAWFXVx0VpjAFUlz++nY/VKx62aEDpphQulhMaNLpsiD6nMVqdddTFXBUQLIg1p3QgcbUjJgEw/Ni/7OP+rFRPcyqLreb3W+VOMceZG6HlTnvoHa+xQiD7LybRcptrkMyjl5NRDRPKdWHLkz9zwp5Ja8KeZGpaRrh2UrR/LiJrt3dEj4GSp8/4xTymrJQ0nHnHAtYwpQ47bqZC3h9rQLnqJfY7JzlGAQ+2znn9TnFY7DxvBzNiJTNDurBRvt5aDBGidVLHqJXSJlU8rKaR6C1YJ3jFHxygtusHM2y3CtL2Gaw9CadpVLLMqroQJdSYn1OUaJKUMjphBXY+ugsFY0FwTO4fcwdY936eB6KXEVjfU6Ceeg4mURNJ8WUfFZLhCZqfvndPYTX9dtzE8V8Eg0Oh4fMFEQT1+fUhMNfqT4nNULCSWvhk2gK+8CCZn5gwQQs1HwgzmOjBNoMxwcPY3e4/tyaIMkXz/nRJ+1olAP6uP1cH08yOlwvAUrcqQKuHn1RtuaVfWCBruSbzw4sEE/OvrSgpMezL8MkXzhmqe23u/slr3HdxWJMT5z51qmny/d19RhU1x5+BtSszdmX41EvPgcWPPUQ2ZERU+iAw97SCW7D0iFZbbfpj79pnVAymC33Sgq4VjIfzsd+sxDX33Yft4b0s1AnVj6c4MbsvT3BbUzJehc6sBAVwGli2Ciu78snGHSH9er783y6DDIjb0pREKo0DJfb/mu1Xj5Fst/ecYAxm8tV4uziZGMlKVc/07+ZQgdiCkk2pX9jwuTxLBREkHFroaPrxvrAFC0TUy2DqVFwuT85wKXtD+vNdnf8vv/sPz/3+/3P/ftrt92sl14bPZLN9y2jU+9KKeJYV/VFmspcm2M100RB4HxSHjQiTQ9JJBWSz8/zO8EtWj7BTbALhRvVpxfHC7Zd1/cbffV99zzRpF1vT0LZLpTHE9xcwfAyC2WMjAi96lLPxLpzcilYaav//XDI7TmJlXDZi1JX7rllt225Nx5wOck9djom2t9nnI6zszNzjWI5TkfcgDHLWDfKk+x39z8e7XnOAvZMJvPjQ+1DRTOdNZdMjkr4doTfRsLrZwcWzLEWYUre2yo17ZzhiGoT1pKFv9+dZxLX/Nr0X+cGAZMRJq25fxIMHN+dzEveh2MtosWS92+Qsr8faR2VuRr2/3Ss7uZ+Uo7HeHUAAAEDSURBVMGLI63lAlL2pyQb6VZXDU1Ish0m/fJIa8I54/yvhyJ36+s5BU0vmGq1TSFz+u2FYbhkED3DORl4F+HKOv/Z8t6Mxwyo0Xszd8EsN9JHH8C+k3/u/nCk9T4tEtO/dWw2n574cGz24oEFs2O5x/qcY72W0g66Wgwd0I0QSrLOvjRBV+EYdIW/yS/n+9fH5jFlyEzI/tBvj/fzEGTKhpLeHWnNBpGJeXgFJfnFUi+e4LZ8pPUEBIL+rIbb5/eVjpPv7OPkez5O/gvD4l94iLyOtH4dS/0X9vI/sTcSlabR6bz/Pu4+KIF6+7H7un/+3i6qqmOpogWc05O9VzinZu//AG5V/R41TIN+AAAAAElFTkSuQmCC" alt="foto-de-perfil">
                </div>
                <div>    
                    <h2><?php echo ($usuario['nombreEmpresa']); ?></h2>
                    <p><?php echo ($usuario['email']); ?></p>
                </div>
            </div>
        </section>
    </article>
    <article class="container-info">
        <section class="info">
           
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/perfil-datos.png" alt="tarjeta-informacion"></div>
                <div>    
                    <h3>Datos de cuenta</h3>
                    <p>Datos que representan a la cuenta de Sigto</p>
                    <form action="#">
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?php echo $usuario["email"] ?>" >
                        </div>
                        <div>
                            <label for="telefono">Telefono:</label>
                            <input type="email" name="email" value="<?php echo "099456559" ?>" >
                        </div>
                    </form>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/tarjeta.png" alt="logo-perfil"></div>
                <div>    
                    <h3>Tarjetas</h3>
                    <p>Tarjetas guardadas en tu cuenta.</p>
                    <form action=""></form>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/ubicacion.png" alt="ubicacion"></div>
                <div>    
                    <h3>Direcciones</h3>
                    <p>Direcciones guardadas en tu cuenta.</p>
                    <form action="#">
                        <div>
                            <label for="direccion">Direccion:</label>
                            <input type="text" name="direccion" id="direccion" value="<?php echo "Juan Perez 1625 esq Julio"?>">
                        </div>
                    </form>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/privacidad.png" alt="privacidad"></div>
                <div>    
                    <h3>Privacidad</h3>
                    <p>Preferencias y control sobre el uso de tus datos.</p>
                    <form action=""></form>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="container-contenido">
                <div><img src="/proyecto-sigto/assets/img/mensaje.png" alt="mensajes"></div>
                <div>    
                    <h3>Comunicaciones</h3>
                    <p>Elige qué tipo de información quieres recibir.</p>
                    <form action=""></form>
                </div>
                <div class="flechita">
                    <img src="/proyecto-sigto/assets/img/flecha.png" alt="flecha">
                </div>
            </div>
            <div class="cerrar-sesion">
                <form  method="post">
                    <button type="submit" name="cerrar_sesion">Cerrar sesion</button>    
                </form>
                
            </div>
        </section>
    </article>
</main>
<script src="/proyecto-sigto/assets/js/index.js"></script>
<script src="/proyecto-sigto/assets/js/perfilPersonal.js"></script>
</body>
</html>
