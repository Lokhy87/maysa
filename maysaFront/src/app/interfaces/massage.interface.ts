import { MassageCollection } from './massageCollection.interface';
import { MassagePrice } from './massagePrice.interface';

export interface Massage {
  id: number;
  name: string;
  subtitle: string;
  description: string;
  image: string;
  active: boolean;
  position: number;
  collection: MassageCollection;
  prices: MassagePrice[];
}