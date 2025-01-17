import { Component } from '@angular/core';
import { HousingLocationComponent } from '../housing-location/housing-location.component';
import { HousingLocation } from '../housing-location';

@Component({
  selector: 'app-home-component',
  standalone: true,
  imports: [HousingLocationComponent],
  templateUrl: './home-component.component.html',
  styleUrl: './home-component.component.css'
})
export class HomeComponentComponent {
  public houses: HousingLocation[] = [{
    id: 1,
    name: "Casa bonita",
    city: "Ciudad bonita",
    photo: "https://media.v2.siweb.es/uploaded_thumb_big/9fb7c789c323c64d5c4e4fcb00491d67/post_1_abril_penthouses.jpg",
    wifi: true,
    meters: 200
  },
  {
    id: 2,
    name: "Casa no tan bonita",
    city: "Ciudad no tan bonita",
    photo: "https://www.yaencontre.com/noticias/wp-content/uploads/2014/10/penthouse2.jpg",
    wifi: false,
    meters: 100
  },
  {
    id: 2,
    name: "Casa no tan fea",
    city: "Ciudad no tan fea",
    photo: "https://www.proyectosdecasas.es/files/images/casas-modernas-proyectos-zx108.jpg",
    wifi: false,
    meters: 120
  }
  ];
};
