function desktopOuMobile() {
    // true -> mobile / false -> desktop
    if(window.innerWidth < 668)
        return true

    return false
}


function iniciaAnimacaoCard() {
    document.querySelectorAll('div.card').forEach(element => {
        element.classList.add('card-create-anim')
    })

    // remove o 'observador' de evento scroll, para otimização
    document.removeEventListener('scroll', funcaoScroll)
}


const funcaoScroll = event => {
    // mob 242 desktop 243
    if (window.scrollY > 242 && desktopOuMobile())
        iniciaAnimacaoCard()

    else if (window.scrollY > 243 && !desktopOuMobile())
        iniciaAnimacaoCard()
}

document.addEventListener('scroll', funcaoScroll)
