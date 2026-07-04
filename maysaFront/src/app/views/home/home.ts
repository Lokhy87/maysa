import { Component } from '@angular/core';
import { Hero } from '../../components/hero/hero';
import { FeatureCard } from '../../components/feature-card/feature-card';
import { Carrousel } from "../../components/carrousel/carrousel";
import { WhyMaysa } from '../../components/why-maysa/why-maysa';
import { Footer } from "../../components/footer/footer";

@Component({
  selector: 'app-home',
  imports: [Hero, FeatureCard, Carrousel, WhyMaysa, Footer],
  templateUrl: './home.html',
  styleUrl: './home.css',
})
export class Home {}
