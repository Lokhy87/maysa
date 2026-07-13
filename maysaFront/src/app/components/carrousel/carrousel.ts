import { Component } from '@angular/core';
import { TranslatePipe } from '@ngx-translate/core';

@Component({
  selector: 'app-carrousel',
  imports: [TranslatePipe],
  templateUrl: './carrousel.html',
  styleUrl: './carrousel.css',
})
export class Carrousel {}
