import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { TranslatePipe } from '@ngx-translate/core';

@Component({
  selector: 'app-about-us',
  imports: [RouterLink, TranslatePipe],
  templateUrl: './about-us.html',
  styleUrl: './about-us.css',
})
export class AboutUs {}
