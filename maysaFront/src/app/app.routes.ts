import { Routes } from '@angular/router';
import { Home } from './views/home/home';
import { Experiences } from './views/experiences/experiences';
import { Contact } from './views/contact/contact';
import { AboutUs } from './views/about-us/about-us';

export const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', component: Home },
  { path: 'experiences', component: Experiences },
  { path: 'aboutus', component: AboutUs },
  { path: 'contact', component: Contact },
];
