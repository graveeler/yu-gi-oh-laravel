document.querySelectorAll('tr[data-english-name]').forEach(row => {
    row.addEventListener('click', function () {
        // Recuperar dados dos atributos da linha
        const englishName = this.getAttribute('data-english-name');
        const portugueseName = this.getAttribute('data-portuguese-name');
        const level = this.getAttribute('data-level');
        const type = this.getAttribute('data-type');
        const attribute = this.getAttribute('data-attribute');
        const atk = this.getAttribute('data-atk');
        const def = this.getAttribute('data-def');
        const description = this.getAttribute('data-description');
        const descriptionPtBr = this.getAttribute('data-description-pt-br');
        const formats = this.getAttribute('data-formats');
        const banlists = this.getAttribute('data-banlists');
        //console.log(descriptionPtBr);
        //console.log(description);

        // Atualizar o conteúdo do modal
        document.querySelector('#imageModal .modal-title').textContent = `${englishName} / ${portugueseName}`;
        document.querySelector('#modalImage').src = this.querySelector('img').src.replace('cards_small', 'cards');

        document.querySelector('#description').textContent = 'Description:';
        document.querySelector('#modalDescription').textContent = description;

        document.querySelector('#descricao').textContent = 'Descrição:';
        document.querySelector('#modalDescriptionPtBr').textContent = descriptionPtBr;

        document.querySelector('#imageModal .modal-body .mb-2').innerHTML = `
            <img src="https://www.db.yugioh-card.com/yugiohdb/external/image/parts/attribute/attribute_icon_${attribute.toLowerCase()}.png" style="width: 20px;" alt="">
            <span> ${attribute} </span>
            <span> | </span>
            <img src="https://www.db.yugioh-card.com/yugiohdb/external/image/parts/icon_level.png" style="width: 20px;" alt="">
            <span> Nível ${level} </span>
            <span class="d-none d-sm-inline"> | </span>
            <span class="d-block d-sm-inline"> ${type} </span>
            <span style="font-size: 14px" class="d-block d-sm-inline"> [ATK ${atk} | DEF ${def || '-'}] </span>
        `;


        let arrayFormats = JSON.parse(formats)[0].formats.split(', ');
        let textFormats = '';

        arrayFormats.forEach(format => {
            textFormats += `<li>${format}</li>`;
            console.log(format);
        });

        document.querySelector('#modalFormats').innerHTML = textFormats;

        let banlist = JSON.parse(banlists)[0];

        if (banlist) {
            document.querySelector('#modalBanlist').innerHTML = `
            <li>Ban TCG: ${banlist.ban_tcg ? banlist.ban_tcg : ''}</li>
            <li>Ban OCG: ${banlist.ban_ocg ? banlist.ban_ocg : ''}</li>
            <li>Ban GOAT: ${banlist.ban_goat ? banlist.ban_goat : ''}</li>`;
        }else{
            document.querySelector('#modalBanlist').innerHTML = `
            <li>Ban TCG: </li>
            <li>Ban OCG: </li>
            <li>Ban GOAT: </li>`;
        }


        console.log(JSON.parse(banlists))


    });
});


