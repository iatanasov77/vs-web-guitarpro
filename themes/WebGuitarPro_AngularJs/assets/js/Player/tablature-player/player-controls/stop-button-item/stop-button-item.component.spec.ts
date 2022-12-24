import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StopButtonItemComponent } from './stop-button-item.component';

describe('StopButtonItemComponent', () => {
  let component: StopButtonItemComponent;
  let fixture: ComponentFixture<StopButtonItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ StopButtonItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StopButtonItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
