<?php
function getTarot($num){
    return "./images/tarot/tarot0" . $num . ".jpg";
}

$tarot_links = array(
    1 => "https://www.gnosisinternacional.com/tarot-carta-1/",
    2 => "https://www.gnosisinternacional.com/tarot-carta-2/",
    3 => "https://www.gnosisinternacional.com/tarot-carta-3/",
    4 => "https://www.gnosisinternacional.com/tarot-carta-4/",
    5 => "https://www.gnosisinternacional.com/tarot-carta-5/",
    6 => "https://www.gnosisinternacional.com/tarot-carta-6/",
    7 => "https://www.gnosisinternacional.com/tarot-carta-7/",
    8 => "https://www.gnosisinternacional.com/tarot-carta-8/",
    9 => "https://www.gnosisinternacional.com/tarot-carta-9/"
);

$tonic_results = array(
    1 => "Tienes Capacidad para vencer obstáculos, iniciativas positivas, voluntad, virtud, perseverancia, triunfo ante lo adverso, ASPECTO NEGATIVO: Vanidad, Egoísmo.",
    2 => "Tienes Capacidad de observación. Ingenio para concertar negocios complicados, Manantial de vida, tu intuición no engaña, ASPECTO NEGATIVO: inconstancia, torpeza.",
    3 => "Producción material y espiritual, sabes formar ideas ASPECTO NEGATIVO: Ostentación y desenfreno",
    4 => "La Cruz de la Iniciación, Progreso, éxito, elevación espiritual ASPECTO NEGATIVO: obstinación y excentricidad",
    5 => "Hombre regenerándose o perdiéndose, Cooperación inesperada; ayuda de iguales o superiores, Mano amiga y pródiga ASPECTO NEGATIVO: entrometismo e inconstancia.",
    6 => "El enamorado, La victoria. Buena suerte. Envidias en acecho; trampas importunas; confianzas traicioneras, amigos engañosos, intrigantes. ASPECTO NEGATIVO: lascivia y contradicción ",
    7 => "Impulsos y deseos de superación, sus esfuerzos hallan recompensa, ASPECTO NEGATIVO: obsesión y ofuscación ",
    8 => "Pruebas y dolores, iniciación, La ley del equilibrio, Evolución e involución, atracción y rechazo. Hallazgo productivo ASPECTO NEGATIVO: falsía y desconfianza",
    9 => "Concreción, culminación y elevación de anhelos, Una palabra demás que lo desprestigia, ASPECTO NEGATIVO: agresividad y violencia"
);

$urgency_results = array(
    1 => "Trabajar con la mente, Sé en tus obras como eres en tus pensamientos, eliminar dudas y demoras",
    2 => 'El Espíritu y la materia viven en eterna lucha, Pedid y se os Dará, integración con la madre divina, Juego de Opuestos, El viento y las olas van siempre en favor de quien sabe navegar". prudencia en la generosidad indiscriminada. Trabajar con la Ira.',
    3 => "Encarnar el Verbo, la palabra, Tejiendo está tu telar, telas para tu uso y telas que no has de usar, matrimonio, aproveche las oportunidades, eliminar la duda",
    4 => "Al trabajo de tus manos, da bendición y en el del pensamiento, pon razón, Distanciamientos; frialdad afectiva; desconcierto",
    5 => "No juzgar para no ser juzgados, toma en sus manos las riendas de su propio destino y se convierte en ángel o demonio, De oídas te había oído; más ahora mis ojos te ven y mi corazón te siente.",
    6 => "Determinación de estado, Trabajos me das señor, más con ellos fortaleza, No se deje tentar; fije sus posiciones; guíese por lo espiritual, seguridad de sí mismo",
    7 => "Eliminación de dudas y errores, Cuando la ciencia entre a tu corazón y la sabiduría sea dulce a tu alma, pide y te será dado, lamentaciones inútiles",
    8 => "Se necesita una gran paciencia para no caer en el Abismo... ¡Somos probados muchas veces, paciencia de Job, Edifica un altar en tu corazón, mas no hagas de tu corazón un altar, no divague; recuerdos exhumados que atormentan, Ruptura; disensiones; altercados; separación.",
    9 => "Ausencia de equilibrio interior, Afirme su discreción, medite sobre la oportunidad de su anhelo, debe ser humilde para alcanzar la Sabiduría y después de lograrlo debe ser todavía más humilde que nadie, Sube al monte y contempla la tierra prometida; más no te digo que entrarás en ella."
);

$nature_results = array(
    1 => "Poder volitivo, Dominio de las fuerzas en movimiento, sanos ideales.",
    2 => "Pasión arrolladora, exaltación espiritual, riñas, ira, amarguras, disensiones",
    3 => "Expansión de ideas y deseos, atracción recíproca; besos castos.",
    4 => "Realización de cosas materiales. Contactos afectivos intensos control de lo material, erotismo",
    5 => 'el "Karma" del Iniciado, Dominio de las pasiones, Retracción; dilación; nostalgias persistentes, aislamiento.',
    6 => "El deseo, la mente, la mala voluntad, Lucha terrible entre el amor y el Deseo, Abstinencia y Gula, libertad y necesidad, deber y derecho, Cavilaciones constantes, callejón sin salida, abatimiento, desazones",
    7 => "dolor, amargura.",
    8 => "Modere sus ímpetus y deseos; no tome decisiones por hoy, relájese",
    9 => "ausencia de equilibrio interior, ser más discreto"
);

$physic_results = array(
    1 => "Llena tu cáliz (cerebro) con el vino sagrado de la luz -Rige la Cabeza",
    2 => "Intercambio, duplicidad. -Rige la Garganta y cuello",
    3 => "Trabajo con La energía sexual, -Rige la Nuca y los Brazos",
    4 => "Trabajar con los 4 elementos-Rige la Glandula Timo",
    5 => "El cuerpo como pentalfa-Rige el Corazon",
    6 => "El hombre entre el vicio y la Virtud-Rige Vientre e Intestinos",
    7 => "Trabajo en la alkimia para adquirir la espada-Rige los Riñones ",
    8 => "Gravitar en el corazon -Rige Organos Sexuales ",
    9 => "El sexo -Rige Arterias Femorales"
);

$talent_results = array(
    1 => "El verbo, la palabra, Mente superior, dignidad, iniciativa.",
    2 => "La ciencia oculta, Claridad conceptual, lucidez, criterio analítico",
    3 => "Conocimiento de lo oculto, ",
    4 => "Dominio de sí mismo, obediencia",
    5 => "Pentagrama esoterico, autoridad, Control de las fuerzas naturales, ",
    6 => "es la Suprema Afirmación del Cristo Interno y la Suprema Negación del Satán.",
    7 => "El espíritu gobierna la materia, Triunfo en lo que se propone, ",
    8 => "Muerte y resurreccion ",
    9 => "Intrepidez, hombre solitario, Amor divino, prudencia, Discreción, caridad y conocimiento"
);
?>