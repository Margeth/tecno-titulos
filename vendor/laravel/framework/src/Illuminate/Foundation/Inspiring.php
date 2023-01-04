<?php

namespace Illuminate\Foundation;

use Illuminate\Support\Collection;

class Inspiring
{
    /**
     * Get an inspiring quote.
     *
     * Taylor & Dayle made this commit from Jungfraujoch. (11,333 ft.)
     *
     * May McGinnis always control the board. #LaraconUS2015
     *
     * RIP Charlie - Feb 6, 2018
     *
     * @return string
     */
    public static function quote()
    {
        return Collection::make([
            'No cuentes los días, haz que los días cuenten. - Muhammad Ali', 
            'El amor no tiene cura, pero es la cura para todos los males. Leonard Cohen', 
            'El mejor momento del día es ahora. - Pierre Bonnard ', 
            'Sé el cambio que quieres ver en el mundo. - Mahatma Gandhi',
            'Piensa, sueña, cree y atrévete.- Walt Disney',
            'El sentido de la vida es tener valores, no cosas de valor.
            Cree que puedes y casi lo habrás logrado. - Theodore Roosevelt',
            'Vayas donde vayas, ve con todo tu corazón. - Confucio',
            'La mejor forma de predecir el futuro es creándolo. - Abraham Lincoln',
            'Solo imagina lo precioso que puede ser arriesgarse y que todo salga bien. - Mario Benedetti',
            'El que tiene un porqué para vivir, puede soportar casi cualquier cómo. - Viktor Frankl',
            'Si quieres cambiar el mundo, cámbiate a ti mismo. - Mahatma Ghandi',
            'La vida no se trata de encontrarte a ti mismo, sino de crearte a ti mismo. - Bernard Shaw',
            'Alguien se sienta en una sombra hoy porque alguien plantó un árbol hace mucho tiempo. - Warren Buffet',
            'La felicidad no ocurre por casualidad, sino por elección. - Jim Rohn',
            'Vive la vida que amas. Ama la vida que vives. - Bob Marley',
            'La verdadera felicidad consiste en hacer el bien. - Aristóteles',
            'Háblate a ti mismo como harías con alguien a quien amas. - Brene Brown',
            'Nada de lo que vistes es más importante que tu sonrisa. - Connie Stevens',
            'Vivir es nacer a cada instante. - Erich Fromm',
            'La vida debe ser comprendida hacia detrás, pero debe ser vivida hacia delante. - Kierkegard',
            'No lastimes a los demás con lo que te causa dolor a ti mismo. - Buda',
            'La felicidad no brota de la razón, sino de la imaginación.- Kant',
            'En la vida hay algo peor que el fracaso, no haberlo intentado. - Roosevelt',
            'Cuando haya una voz en tu cabeza que te diga que no puedes pintar, pinta tanto como puedas y verás cómo se callará.- Van Gogh',
         
        ])->random();
    }
}
