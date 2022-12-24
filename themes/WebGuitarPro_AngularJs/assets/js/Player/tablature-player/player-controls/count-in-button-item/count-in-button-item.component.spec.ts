import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CountInButtonItemComponent } from './count-in-button-item.component';

describe('CountInButtonItemComponent', () => {
  let component: CountInButtonItemComponent;
  let fixture: ComponentFixture<CountInButtonItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CountInButtonItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CountInButtonItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
