import { TestBed } from '@angular/core/testing';

import { Complement } from './complement';

describe('Complement', () => {
  let service: Complement;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(Complement);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
