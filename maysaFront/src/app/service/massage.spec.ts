import { TestBed } from '@angular/core/testing';

import { Massage } from './massage';

describe('Massage', () => {
  let service: Massage;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(Massage);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
